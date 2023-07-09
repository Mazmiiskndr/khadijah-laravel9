<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Bank;
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
    public $provinces, $cities, $districts, $couriers;
    public $province_id, $city_id, $district_id, $province_name, $city_name, $district_name;
    // FOR API
    public $expedition,$parcel, $deliveryCost = 0;
    // FOR TRANSACTION
    public $product_id, $quantity, $price, $subTotal, $total, $paymentMethod, $weight;
    // ShippingCost Parcels
    public $parcels = [];
    // FOR CARTS DATA
    public $carts = [];
    // BANK DATA
    public $bank = [];

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
        $this->bank = Bank::first();
        // Set the customer_uid by retrieving the customer ID of the logged-in customer using Auth
        $this->customer_uid = Auth::guard('customer')->user()->customer_uid;
        // Show customer data by calling the showCustomer function
        $this->provinces = $apiRajaOngkirService->getProvinces();
        $this->cities = collect();
        $this->showCustomer($customerService, $apiRajaOngkirService, $this->customer_uid);
        if($this->district_id)
        {
            $this->couriers = $apiRajaOngkirService->getCouriers();
        }

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
        if($customer->province_id && $customer->city_id && $customer->district_id){
            $this->province_name = $customer->province;
            $this->city_name = $customer->city;
            $this->district_name = $customer->district;
            $this->postal_code = $customer->postal_code;
        }
        $this->populateFormFields($customer, $apiRajaOngkirService);
    }

    /**
     * Updates the cities list when the selected province changes.
     * @param  mixed $value The ID of the selected province.
     * @return void
     */
    public function updatedProvinceId($value)
    {
        $this->cities = $this->getCities($value);

        // Reset the selected city and district
        $this->reset(['district_id', 'city_id']);
    }

    /**
     * Updates the districts list when the selected city changes.
     * @param  mixed $value The ID of the selected city.
     * @return void
     */
    public function updatedCityId($value)
    {
        $this->districts = $this->getDistricts($value);
        // Reset the selected district
        $this->reset('district_id');
    }

    /**
     * Updates the districts list when the selected city changes.
     * @param  mixed $value The ID of the selected city.
     * @return void
     */
    public function updatedDistrictId($value)
    {
        $apiRajaOngkirService = app(ApiRajaOngkirService::class);
        $this->couriers = $apiRajaOngkirService->getCouriers();
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
            $district = $this->getDistrictById($this->district_id);
            $city = $this->getCityById($this->city_id);
            // Prepare the data for storing a checkout by calling the prepareDataStoreCheckout method
            $data = $this->prepareDataStoreCheckout($district, $city['postal_code']);

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
            session()->flash('error', 'Terjadi kesalahan saat mencoba membuat order : ' . $e->getMessage());
        }
    }


    /**
     * The function prepares and returns an array of data for use in the checkout process, including
     * order details, shipping details, and cart items.
     */
    private function prepareDataStoreCheckout($district, $postal_code)
    {
        return [
            // For function createOrder in CheckoutService and updateCustomer
            'customer_id' => $this->customer_id,
            'total' => $this->total,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'province_name' => $district['province'],
            'city_name' => $district['type']. " " . $district['city'],
            'district_name' => $district['subdistrict_name'],
            'province_id' => $district['province_id'],
            'city_id' => $district['city_id'],
            'district_id' => $district['subdistrict_id'],
            'postal_code' => $postal_code,
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
            $this->weight = $cart->quantity * $cart->product->weight;

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
        // If a city is selected, populate the city field and fetch the cities belonging to the selected province
        if (!is_null($customer->city_id)) {
            $this->city_id = $customer->city_id;
            $this->cities = $this->getCities($customer->province_id);
        }

        // If a district is selected, populate the district field and fetch the districts belonging to the selected city
        if (!is_null($customer->district_id)) {
            $this->district_id = $customer->district_id;
            $this->districts = $this->getDistricts($customer->city_id);
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

    /**
     * Calls the RajaOngkir API to get a list of cities.
     * @param  mixed $provinceId The ID of the selected province.
     * @return Collection
     */
    protected function getCities($provinceId)
    {
        // Resolve the API service from the service container
        return app(ApiRajaOngkirService::class)->getCities($provinceId);
    }

    /**
     * Calls the RajaOngkir API to get a list of districts.
     * @param  mixed $cityId The ID of the selected city.
     * @return Collection
     */
    protected function getDistricts($cityId)
    {
        // Resolve the API service from the service container
        return app(ApiRajaOngkirService::class)->getSubDistrictByCity($cityId);
    }

    /**
     * Calls the RajaOngkir API to get a list of district by ID.
     * @param  mixed $cityId The ID of the.
     * @return Collection
     */
    protected function getDistrictById($districtId)
    {
        // Resolve the API service from the service container
        return app(ApiRajaOngkirService::class)->getSubDistrictById($districtId);
    }

    /**
     * Calls the RajaOngkir API to get a list of City by ID.
     * @param  mixed $cityId The ID of the.
     * @return Collection
     */
    protected function getCityById($cityId)
    {
        // Resolve the API service from the service container
        return app(ApiRajaOngkirService::class)->getCityById($cityId);
    }


}



