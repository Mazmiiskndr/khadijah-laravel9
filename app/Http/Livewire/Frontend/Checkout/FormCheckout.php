<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShippingDetail;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Cart\CartService;
use App\Services\Checkout\CheckoutService;
use App\Services\Customer\CustomerService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormCheckout extends Component
{
    // Define public properties
    public $customer_uid, $name, $email, $address, $postal_code, $phone;
    public $provinces, $cities, $districts;
    public $province_id, $city_id;
    // FOR API
    public $expedition,$parcel, $deliveryCost = 0;
    // FOR TRANSACTION
    public $product_id, $quantity, $price, $subTotal, $total, $paymentMethod, $weight;
    // ShippingCost Parcels
    public $parcels = [];

    // Validation rules
    protected $rules = [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'province_id' => 'required',
        'city_id' => 'required',
        'address' => 'required',
        'expedition' => 'required',
        'parcel' => 'required',
        'paymentMethod' => 'required',
    ];

    // Validation error messages
    // Validation error messages
    protected $messages = [
        'name.required' => 'Nama wajib diisi.',
        'phone.required' => 'Nomor telepon wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format Email tidak valid.',
        'province_id.required' => 'Provinsi wajib diisi.',
        'city_id.required' => 'Kota wajib diisi.',
        'address.required' => 'Alamat wajib diisi.',
        'expedition.required' => 'Ekspedisi wajib dipilih.',
        'parcel.required' => 'Paket wajib dipilih.',
        'paymentMethod.required' => 'Jenis Transaksi wajib dipilih.',
    ];

    /**
     * Mount the component.
     * @param CustomerService $customerService
     * @param ApiRajaOngkirService $apiRajaOngkirService
     */
    public function mount(CustomerService $customerService, ApiRajaOngkirService $apiRajaOngkirService)
    {
        // Set the customer_uid by retrieving the customer ID of the logged-in customer using Auth
        $this->customer_uid = Auth::guard('customer')->user()->customer_uid;
        // Show customer data by calling the showCustomer function
        $this->provinces = $apiRajaOngkirService->getProvinces();
        $this->cities = collect();
        $this->showCustomer($customerService, $apiRajaOngkirService, $this->customer_uid);

    }

    /**
     * Handle updated property.
     * @param string $property
     */
    public function updated($property)
    {
        // Validate only the updated property
        $this->validateOnly($property);
    }

    /**
     * Render the component.
     * @param CartService $cartService
     * @return \Illuminate\Contracts\View\View
     */
    public function render(CartService $cartService)
    {
        return view('livewire.frontend.checkout.form-checkout', ['carts' => $this->getCustomerCartData($cartService)]);
    }

    /**
     * Show customer data.
     * @param CustomerService $customerService
     * @param ApiRajaOngkirService $apiRajaOngkirService
     * @param string $customer_uid
     */
    public function showCustomer(CustomerService $customerService, ApiRajaOngkirService $apiRajaOngkirService, $customer_uid)
    {
        $customer = $customerService->findByUid($customer_uid);
        $this->populateFormFields($customer, $apiRajaOngkirService);
    }

    /**
     * Handle province_id updates.
     * @param mixed $value
     */
    public function updatedProvinceId($value)
    {
        // Fetch the cities in the selected province
        $this->cities = app(ApiRajaOngkirService::class)->getCities($value);

        // Reset the selected city
        $this->reset(['city_id']);
    }

    /**
     * Handle city_id updates.
     * @param mixed $value
     */
    public function updatedCityId($value)
    {
        $cityData = app(ApiRajaOngkirService::class)->getCityById($value);
        $this->postal_code = $cityData['postal_code'];
    }

    /**
     * Handle expedition updates.
     * @param mixed $value
     */
    public function updatedExpedition($value)
    {
        // Fetch the parcels for the selected expedition
        $contactData = app('contactData');
        $this->parcels = app(ApiRajaOngkirService::class)->getCostParcel($contactData, $this->city_id, 300, $value);

        // Reset parcel selection
        $this->parcel = null;
    }

    /**
     * Handle parcel updates.
     * @param mixed $value
     */
    public function updatedParcel($value)
    {
        // Fetch the selected parcel
        $selectedParcel = collect($this->parcels)->firstWhere('service', $value);

        // Update the delivery cost
        $this->deliveryCost = $selectedParcel['cost'][0]['value'] ?? 0;
    }

    /**
     * Store the checkout data using a CheckoutService and handle success and error scenarios.
     * @param CheckoutService $checkoutService The instance of CheckoutService responsible for storing the checkout order.
     * @return void
     */
    public function storeCheckout(CheckoutService $checkoutService)
    {
        // Validate the data before storing it
        $this->validate();
        try {
            // You can use the data() method to get an array of all the public non-null properties on a component.
            $data = $this->prepareDataStoreCheckout();
            $result = $checkoutService->storeCheckout($data);
            // If success
            if (isset($result['success'])) {
                // Here you can handle a success scenario, such as redirecting to another page or displaying a success message.
                session()->flash('success', 'Order berhasil dibuat.');
                // TODO: HANDLE EMIT
            } else {
                // Display generic error message
                session()->flash('error', 'Terjadi kesalahan saat mencoba membuat order.');
            }
        } catch (Exception $e) {
            // Log the exception for debugging
            Log::error($e->getMessage());

            // Flash error message to the session
            session()->flash('error', 'Terjadi kesalahan saat mencoba membuat order. Silakan coba lagi.');
        }
    }


    /**
     * The function prepares and returns an array of data for use in the checkout process, including
     * order details, shipping details, and cart items.
     */
    private function prepareDataStoreCheckout()
    {
        return [
            // For function createOrder in CheckoutService and updateCustomer
            'total' => $this->total,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'city_id' => $this->city_id,
            'province_id' => $this->province_id,
            'postal_code' => $this->postal_code,
            'phone' => $this->phone,
            // For function createShippingDetail in CheckoutService
            'expedition' => $this->expedition,
            'parcel' => $this->parcel,
            'deliveryCost' => $this->deliveryCost,
            'weight' => $this->weight,
            // For function processCartItems in CheckoutService
        ];
    }

    /**
     * Fetch customer cart data.
     * @param CartService $cartService
     * @return mixed
     */
    private function getCustomerCartData(CartService $cartService)
    {
        $carts = $cartService->getAllDataByCustomer(Auth::guard('customer')->user()->id);
        /** @var iterable|object $carts */

        // Initialize the subtotal
        $this->subTotal = 0;
        $this->weight = 0;
        // Calculate the subtotal
        foreach ($carts as $cart) {
            $totalPerPrice = $cart->quantity * $cart->product->price;
            $this->weight = $cart->quantity * $cart->product->weight;
            if ($cart->product->discount > 0
            ) {
                // Apply discount if available
                $this->subTotal += $totalPerPrice - $cart->product->discount;
            } else {
                $this->subTotal += $totalPerPrice;
            }
        }

        // Calculate the total by adding the subtotal and delivery cost
        $this->total = $this->subTotal + $this->deliveryCost;
        return $carts;
    }

    /**
     * Populate the form fields with customer data.
     * @param mixed $customer
     * @param ApiRajaOngkirService $apiRajaOngkirService
     */
    private function populateFormFields($customer, ApiRajaOngkirService $apiRajaOngkirService)
    {
        $this->customer_uid = $customer->customer_uid;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->address = $customer->address;
        $this->province_id = $customer->province_id;
        $this->postal_code = $customer->postal_code;
        $this->phone = $customer->phone;

        // If city_id is not null, fetch the cities in the selected province
        if (!is_null($customer->city_id)) {
            $this->city_id = $customer->city_id;
            $this->cities = $apiRajaOngkirService->getCities($customer->province_id);
        }
    }

    /**
     * Reset all form fields.
     */
    public function resetFields()
    {
        $this->customer_uid = null;
        $this->name = '';
        $this->email = '';
        $this->address = '';
        $this->postal_code = '';
        $this->phone = '';
        $this->provinces = [];
        $this->cities = [];
        $this->districts = [];
        $this->province_id = null;
        $this->city_id = null;
        $this->expedition = null;
        $this->parcel = null;
        $this->deliveryCost = 0;
        $this->product_id = null;
        $this->quantity = null;
        $this->price = null;
        $this->subTotal = null;
        $this->total = null;
        $this->paymentMethod = null;
        $this->parcels = [];
    }


}



