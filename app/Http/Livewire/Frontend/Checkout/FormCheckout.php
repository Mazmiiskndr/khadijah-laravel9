<?php

namespace App\Http\Livewire\Frontend\Checkout;

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
    public $customer_id, $customer_uid, $name, $email, $address, $postal_code, $phone;
    public $provinces, $cities, $districts;
    public $province_id, $city_id, $province_name, $city_name;
    // FOR API
    public $expedition,$parcel, $deliveryCost = 0;
    // FOR TRANSACTION
    public $product_id, $quantity, $price, $subTotal, $total, $paymentMethod, $weight;
    // ShippingCost Parcels
    public $parcels = [];
    // FOR CARTS DATA
    public $carts = [];

    protected $listeners = [
        'cartDeletedInCart' => 'handleCartDeleted',
    ];

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
        $this->carts = $this->getCustomerCartData($cartService);
        return view('livewire.frontend.checkout.form-checkout', ['carts' => $this->carts]);
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
        $this->customer_id = $customer->id;
        if($customer->province_id && $customer->city_id){
            $this->province_name = $customer['provinceAndCity']['province'];
            $this->city_name = $customer['provinceAndCity']['type'] . " " . $customer['provinceAndCity']['city_name'];
            $this->postal_code = $customer['provinceAndCity']['postal_code'];
        }
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
        $this->province_name = $cityData['province'];
        $this->city_name = $cityData['type'] . " " . $cityData['city_name'];
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
        $this->parcels = app(ApiRajaOngkirService::class)->getCostParcel($contactData, $this->city_id, $this->weight, $value);

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
    public function storeCheckout(CheckoutService $checkoutService, CartService $cartService)
    {
        // Get the cart data
        $carts = $this->getCustomerCartData($cartService);

        // If the cart is empty, stop the process and display an error message
        if (count($carts) == 0) {
            session()->flash('error', 'Tidak ada produk di keranjang. Silakan tambahkan produk ke keranjang sebelum melakukan checkout.');
            return;
        }

        // Validate the incoming request data
        $this->validate();

        try {
            // Prepare the data for storing a checkout by calling the prepareDataStoreCheckout method
            $data = $this->prepareDataStoreCheckout();

            // Store the checkout data using the checkout service and store the result
            $result = $checkoutService->storeCheckout($data);

            // Check if the operation was successful by checking if 'success' key exists in the result
            if (isset($result['success'])) {
                // Convert the order_uid to a string format
                $uuidString = $result['order_uid']->toString();

                // If the operation was successful, redirect to the 'checkout.show' route with a success message
                // Also, pass the order UID in the route parameters
                redirect()->route('checkout.show', $uuidString)->with('success', 'Order berhasil dibuat.');
            } else {
                // If the operation was not successful, flash an error message to the session
                session()->flash('error', 'Terjadi kesalahan saat mencoba membuat order.');
            }
        } catch (Exception $e) {
            // If an exception occurred during the operation, log the exception message for debugging
            Log::error($e->getMessage());

            // Also, flash a generic error message to the session
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
            'customer_id' => $this->customer_id,
            'total' => $this->total,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'city_name' => $this->city_name,
            'province_name' => $this->province_name,
            'city_id' => $this->city_id,
            'province_id' => $this->province_id,
            'postal_code' => $this->postal_code,
            'phone' => $this->phone,
            'paymentMethod' => $this->paymentMethod,
            // For function createShippingDetail in CheckoutService
            'expedition' => $this->expedition,
            'parcel' => $this->parcel,
            'deliveryCost' => $this->deliveryCost,
            'weight' => $this->weight,
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

        // Initialize the subtotal and total variables
        $this->subTotal = 0;
        $this->total = 0;

        // Calculate the subtotal
        foreach ($carts as $cart) {
            $this->weight += $cart->quantity * $cart->product->weight;

            if ($cart->product->discount > 0) {
                $totalPerPrice = $cart->quantity * ($cart->product->price - $cart->product->discount);
            }else{
                $totalPerPrice = $cart->quantity * $cart->product->price;
            }

            $this->subTotal += $totalPerPrice;
        }
        // Calculate the total by adding the subtotal and delivery cost
        $this->total = $this->subTotal + $this->deliveryCost;

        // Return the updated value of $carts
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


    /**
     * This method handles the 'detailCartDeleted' event.
     * @param CartService $cartService An instance of CartService, which provides methods for interacting with the cart.
     */
    public function handleCartDeleted(CartService $cartService)
    {
        $this->carts = $this->getCustomerCartData($cartService);
    }

}



