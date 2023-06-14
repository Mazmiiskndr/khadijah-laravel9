<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Cart\CartService;
use App\Services\Customer\CustomerService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCheckout extends Component
{
    // Define public properties
    public $customer_uid, $name, $email, $address, $postal_code, $phone;
    public $provinces, $cities, $districts;
    public $province_id, $city_id;
    // FOR API
    public $expedition,$parcel;

    public $selectedProvince = null;
    public $selectedCity = null;

    // Validation rules
    protected $rules = [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'province_id' => 'required',
        'city_id' => 'required',
        'address' => 'required',
        'postal_code' => 'required',
    ];

    // Validation error messages
    protected $messages = [
        'name.required' => 'Nama wajib diisi.',
        'phone.required' => 'Telepon wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format Email tidak valid.',
        'province_id.required' => 'Provinsi wajib diisi.',
        'city_id.required' => 'Kota Wajib diisi.',
        'address.required' => 'Alamat wajib diisi.',
        'postal_code.required' => 'Kode pos wajib diisi.',
    ];

    /**
     * Mount the component.
     * @param CustomerService $customerService
     * @param ApiRajaOngkirService $apiRajaOngkirService
     */
    public function mount(CustomerService $customerService, ApiRajaOngkirService $apiRajaOngkirService)
    {
        // TODO: GET COST PARCEL
        // $contact = app('contactData');
        // dd($contact);

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
     * Store the checkout data.
     */
    public function storeCheckout()
    {
        // Validate the data before storing it
        $this->validate();

        // Implement the code to store the checkout data
    }

    // *** TODO: ***
    /**
     * resetFields
     *
     * @return void
     */
    // public function resetFields()
    // {
    //     $this->name = '';
    //     $this->email = '';
    //     $this->password = '';
    //     $this->address = '';
    //     $this->city_id = '';
    //     $this->province_id = '';
    //     $this->district_id = '';
    //     $this->postal_code = '';
    //     $this->phone = '';
    // }

    /**
     * Fetch customer cart data.
     * @param CartService $cartService
     * @return mixed
     */
    private function getCustomerCartData(CartService $cartService)
    {
        return $cartService->getAllDataByCustomer(Auth::guard('customer')->user()->id);
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
}
