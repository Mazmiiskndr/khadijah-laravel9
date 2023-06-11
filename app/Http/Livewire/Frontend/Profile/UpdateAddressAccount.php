<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class UpdateAddressAccount extends Component
{
    // UpdateModal
    public $updateModal = false;
    // Declare variable
    public $customer_id,$address, $postal_code;

    // Declare Region
    public $provinces, $cities;

    // Declare Region ID
    public $province_id, $city_id;

    public $selectedProvince = null;
    public $selectedCity = null;

    // Listeners
    protected $listeners = [
        'updatedCustomerAddress' => '$refresh',
        'getCustomerAddress' => 'show'
    ];

    /**
     * updated
     *
     * @param  mixed $property
     * @return void
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
            'address'       => 'required',
            'city_id'       => 'required',
            'province_id'   => 'required',
            'postal_code'   => 'required',
        ];
    }

    // Make Validation message
    protected function getMessages()
    {
        return [
            'address.required'      => 'Alamat harus diisi',
            'city_id.required'      => 'Kota harus diisi',
            'province_id.required'  => 'Provinsi harus diisi',
            'postal_code.required'  => 'Kode Pos harus diisi',
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
        return view('livewire.frontend.profile.update-address-account');
    }

    /**
     * Updates the cities list when the selected province changes.
     * @param  mixed $value The ID of the selected province.
     * @return void
     */
    public function updatedProvinceId($value)
    {
        // Resolve the API service from the service container
        $apiRajaOngkirService = app(\App\Services\ApiRajaOngkir\ApiRajaOngkirService::class);

        // Fetch the cities belonging to the selected province
        $this->cities = $apiRajaOngkirService->getCities($value);
        // Reset the selected city
        $this->reset(['city_id']);
    }

    /**
     * Populates the form fields with the data of the customer to be updated.
     * @param  mixed $customer The customer data.
     * @return void
     */
    public function show($customer)
    {
        $this->updateModal = true;
        $this->customer_id = $customer['id'];
        $this->address = $customer['address'];
        $this->province_id = $customer['province_id'];

        // If a city is selected, populate the city field and fetch the cities belonging to the selected province
        if (!is_null($customer['city_id'])) {
            $this->city_id = $customer['city_id'];

            $apiRajaOngkirService = app(\App\Services\ApiRajaOngkir\ApiRajaOngkirService::class);
            $this->cities = $apiRajaOngkirService->getCities($customer['province_id']);
        }

        $this->postal_code = $customer['postal_code'];
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

        if ($this->customer_id) {
            // Create an associative array with the data
            $data = [
                    'address' => $this->address,
                    'city_id' => $this->city_id,
                    'province_id' => $this->province_id,
                    'postal_code' => $this->postal_code,
                ];
            // Attempt to update the customer with the provided data
            $updatedCustomer = $customerService->updateCustomerAddress($this->customer_id, $data);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Alamat Berhasil di Update!');
            $this->resetFields();

            // buatkan emit dengan flash message
            $this->emit('updatedCustomerAddress', $updatedCustomer);
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
        $this->address = '';
        $this->city_id = '';
        $this->province_id = '';
        $this->postal_code = '';
    }

}
