<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Cart\CartService;
use App\Services\Customer\CustomerService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Termwind\Components\Dd;

class FormCheckout extends Component
{
    // Define public properties
    public $customer_uid, $name, $email, $address, $postal_code, $phone;
    public $provinces, $cities, $districts;
    public $province_id, $city_id, $district_id;
    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;

    // Validation rules
    protected $rules = [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'province_id' => 'required',
        'city_id' => 'required',
        'district_id' => 'required',
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
        'district_id.required' => 'Kecamatan wajib diisi.',
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
        // Set the customer_uid by retrieving the customer ID of the logged-in customer using Auth
        $this->customer_uid = Auth::guard('customer')->user()->customer_uid;

        // Show customer data by calling the showCustomer function
        $this->showCustomer($customerService, $apiRajaOngkirService, $this->customer_uid);

        // Get all provinces
        $this->provinces = Province::all();

        // Initialize cities and districts as empty collections
        $this->cities = collect();
        $this->districts = collect();
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
     * Get customer details.
     * @param CustomerService $customerService
     * @return mixed
     */
    private function getCustomerDetails(CustomerService $customerService)
    {
        return $customerService->findByUid($this->customer_uid);
    }

    /**
     * Get customer province name.
     * @param mixed $detailCustomer
     * @return mixed|null
     */
    private function getCustomerProvinceName($detailCustomer)
    {
        return $detailCustomer->province ? strtoupper($detailCustomer->province->name) : null;
    }

    /**
     * Get customer cart data.
     * @param CartService $cartService
     * @return mixed
     */
    private function getCustomerCartData(CartService $cartService)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        return $cartService->getAllDataByCustomer($customer_id);
    }

    /**
     * Render the component.
     * @param CartService $cartService
     * @param ApiRajaOngkirService $apiRajaOngkirService
     * @param CustomerService $customerService
     * @return \Illuminate\Contracts\View\View
     */
    public function render(CartService $cartService, ApiRajaOngkirService $apiRajaOngkirService, CustomerService $customerService)
    {
        // Get customer details and province name
        $detailCustomer = $this->getCustomerDetails($customerService);
        $provinceName = $this->getCustomerProvinceName($detailCustomer);

        // Get provinces data using the getProvincesData function
        $this->provinces = $this->getProvincesData($apiRajaOngkirService, $provinceName);

        // Get customer cart data
        $carts = $this->getCustomerCartData($cartService);

        // Return the view with cart data
        return view('livewire.frontend.checkout.form-checkout', compact('carts'));
    }

    /**
     * Show customer data.
     * @param CustomerService $customerService
     * @param ApiRajaOngkirService $apiRajaOngkirService
     * @param mixed $customer_uid
     */
    public function showCustomer(CustomerService $customerService, ApiRajaOngkirService $apiRajaOngkirService, $customer_uid)
    {
        // Find the customer by UID
        $customer = $customerService->findByUid($customer_uid);

        // Set customer data
        $this->customer_uid = $customer->customer_uid;
        $this->name = $customer->name;
        $this->email = $customer->email;

        // Get provinces data from API
        $provincesData = $apiRajaOngkirService->getProvinces();

        // Find the matching province and set the province_id
        foreach ($provincesData as $province) {
            if (strtoupper($province['province']) === strtoupper($customer->province->name)) {
                $this->province_id = $province['province_id'];
                break;
            }
        }

        // Set other customer data
        $this->city_id = $customer->city_id;
        $this->district_id = $customer->district_id;
        $this->address = $customer->address;
        $this->postal_code = $customer->postal_code;
        $this->phone = $customer->phone;
    }

    /**
     * Handle updated ProvinceId property.
     * @param mixed $value
     */
    public function updatedProvinceId($value)
    {
        // TODO: MASIH ERROR and FIXME: MASIH ERROR
        // Get cities based on the selected province_id
        $this->cities = Regency::where('province_id', $value)->get();

        // Reset city_id and district_id
        $this->reset(['city_id', 'district_id']);
    }

    /**
     * Handle updated CityId property.
     * @param mixed $value
     */
    public function updatedCityId($value)
    {
        // Get districts based on the selected city_id
        $this->districts = District::where('regency_id', $value)->get();

        // Reset district_id
        $this->reset('district_id');
    }

    /**
     * Get provinces data.
     * @param ApiRajaOngkirService $apiRajaOngkirService
     * @param mixed|null $provinceName
     * @return array
     */
    private function getProvincesData(ApiRajaOngkirService $apiRajaOngkirService, $provinceName = null)
    {
        // Get provinces data from the API
        $provincesData = $apiRajaOngkirService->getProvinces();

        // Modify provinces data by converting province names to uppercase and adding 'selected' flag
        foreach ($provincesData as &$province) {
            $province['province'] = strtoupper($province['province']);
            $province['selected'] = $provinceName && strtoupper($provinceName) === $province['province'];
        }

        return $provincesData;
    }

    public function storeCheckout()
    {
        // Validate the form data
        $this->validate();
        // code...
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
}
