<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class UpdateAccount extends Component
{
    // UpdateModal
    public $updateModal = false;
    // Declare variable
    public $customer_id, $name, $email, $password, $address, $postal_code, $phone, $registration_date;

    // Declare Region
    public $provinces, $cities, $districts;

    // Declare Region ID
    public $province_id, $city_id, $district_id;

    // Listeners
    protected $listeners = [
        'customerUpdated' => '$refresh',
        'getCustomer' => 'show'
    ];

    /**
     * This function validates a specific property every time it changes.
     */
    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }
    // Rules Validation
    protected function getRules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|email|unique:customer,email,' . $this->customer_id . '',
            'password'      => 'min:6,' . $this->customer_id . '',
            'address'       => 'required',
            'city_id'       => 'required',
            'province_id'   => 'required',
            'district_id'   => 'required',
            'phone'         => 'required',
        ];
    }

    // Make Validation message
    protected function getMessages()
    {
        return [
            'name.required'         => 'Nama harus diisi',
            'email.required'        => 'Email harus diisi',
            'email.email'           => 'Email harus valid',
            'email.unique'          => 'Email telah digunakan oleh pelanggan lain',
            'password.min'          => 'Password harus memiliki setidaknya 6 karakter',
            'address.required'      => 'Alamat harus diisi',
            'city_id.required'      => 'Kota harus diisi',
            'province_id.required'  => 'Provinsi harus diisi',
            'district_id.required'  => 'Kecamatan harus diisi',
            'phone.required'        => 'No. Telepon harus diisi',
        ];
    }

    /**
     * This function mounts the ApiRajaOngkirService and fetches a list of provinces.
     * @param ApiRajaOngkirService $apiRajaOngkirService An instance of the service class for RajaOngkir API interactions.
     */
    public function mount(ApiRajaOngkirService $apiRajaOngkirService)
    {
        $this->resetFields();
        $this->provinces = $apiRajaOngkirService->getProvinces();
        $this->cities = collect();
    }

    /**
     * Renders the 'livewire.frontend.profile.update-account' view.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.frontend.profile.update-account');
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
     * Populates the form fields with the data of the customer to be updated.
     * @param  mixed $customer The customer data.
     * @return void
     */
    public function show($customer)
    {
        // Open the update modal
        $this->updateModal = true;

        // Populate the form fields with the customer data
        $this->customer_id = $customer['id'];
        $this->name = $customer['name'];
        $this->email = $customer['email'];
        $this->address = $customer['address'];
        $this->province_id = $customer['province_id'];

        // If a city is selected, populate the city field and fetch the cities belonging to the selected province
        if (!is_null($customer['city_id'])) {
            $this->city_id = $customer['city_id'];
            $this->cities = $this->getCities($customer['province_id']);
        }

        // If a district is selected, populate the district field and fetch the districts belonging to the selected city
        if (!is_null($customer['district_id'])) {
            $this->district_id = $customer['district_id'];
            $this->districts = $this->getDistricts($customer['city_id']);
        }

        // Continue populating the form fields
        $this->postal_code = $customer['postal_code'];
        $this->phone = $customer['phone'];
    }

    /**
     * Updates an existing customer.
     * @param  CustomerService $customerService The service instance for customer interactions.
     * @return void
     */
    public function update(CustomerService $customerService)
    {
        // Create Validate
        $this->validate($this->getRules(), $this->getMessages());

        $district = $this->getDistrictById($this->district_id);
        $city = $this->getCityById($this->city_id);

        if ($this->customer_id) {
            // Create an associative array with the data
            $data = $this->prepareDataArray($district, $city);

            // Attempt to update the customer with the provided data
            $updatedCustomer = $customerService->updateCustomer($this->customer_id, $data);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Data Profil Berhasil di Update!');
            $this->resetFields();
            // buatkan emit dengan flash message
            $this->emit('updatedCustomer', $updatedCustomer);
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    /**
     * Closes the update modal.
     * @return void
     */
    public function closeModal()
    {
        $this->updateModal = false;
        $this->resetFields();
    }

    /**
     * Resets all the form fields to their default values.
     * @return void
     */
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->address = '';
        $this->city_id = '';
        $this->province_id = '';
        $this->district_id = '';
        $this->postal_code = '';
        $this->phone = '';
    }

    /**
     * Calls the RajaOngkir API to get a list of cities.
     * @param  mixed $provinceId The ID of the selected province.
     * @return Collection
     */
    protected function getCities($provinceId)
    {
        // Resolve the API service from the service container
        $apiRajaOngkirService = app(ApiRajaOngkirService::class);

        // Fetch the cities belonging to the selected province
        return $apiRajaOngkirService->getCities($provinceId);
    }

    /**
     * Calls the RajaOngkir API to get a list of districts.
     * @param  mixed $cityId The ID of the selected city.
     * @return Collection
     */
    protected function getDistricts($cityId)
    {
        // Resolve the API service from the service container
        $apiRajaOngkirService = app(ApiRajaOngkirService::class);

        // Fetch the districts belonging to the selected city
        return $apiRajaOngkirService->getSubDistrictByCity($cityId);
    }

    /**
     * Calls the RajaOngkir API to get a list of district by ID.
     * @param  mixed $cityId The ID of the.
     * @return Collection
     */
    protected function getDistrictById($districtId)
    {
        // Resolve the API service from the service container
        $apiRajaOngkirService = app(ApiRajaOngkirService::class);

        // Fetch the districts belonging to the selected city
        return $apiRajaOngkirService->getSubDistrictById($districtId);
    }

    /**
     * Calls the RajaOngkir API to get a list of City by ID.
     * @param  mixed $cityId The ID of the.
     * @return Collection
     */
    protected function getCityById($cityId)
    {
        // Resolve the API service from the service container
        $apiRajaOngkirService = app(ApiRajaOngkirService::class);

        // Fetch the districts belonging to the selected city
        return $apiRajaOngkirService->getCityById($cityId);
    }

    /**
     * Prepare data array.
     * @param array $district
     * @param array $city
     * @return array
     */
    protected function prepareDataArray($district, $city)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'province_id' => $district['province_id'],
            'city_id' => $district['city_id'],
            'district_id' => $district['subdistrict_id'],
            'province' => $district['province'],
            'city' => $district['type'] . " " . $district['city'],
            'district' => $district['subdistrict_name'],
            'postal_code' => $city['postal_code'],
            'phone' => $this->phone,
            'password' => $this->password,
        ];
    }
}
