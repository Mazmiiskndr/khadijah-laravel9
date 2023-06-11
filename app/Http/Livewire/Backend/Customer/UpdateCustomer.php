<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Customer\CustomerService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateCustomer extends Component
{
    // UpdateModal
    public $updateModal = false;
    // Declare variable
    public $customer_id, $name, $email, $password, $address, $postal_code, $phone, $registration_date;

    // Declare Region
    public $provinces, $cities;

    // Declare Region ID
    public $province_id, $city_id;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;

    // Listeners
    protected $listeners = [
        'customerUpdated' => '$refresh',
        'getCustomer' => 'show'
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
            'name'          => 'required',
            'email'         => 'required|email|unique:customer,email,' . $this->customer_id . '',
            'password'      => 'min:6,' . $this->customer_id . '',
            'address'       => 'required',
            'city_id'       => 'required',
            'province_id'   => 'required',
            'postal_code'   => 'required',
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
            'postal_code.required'  => 'Kode Pos harus diisi',
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
     * Renders the 'livewire.backend.customer.update-customer' view.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.backend.customer.update-customer');
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

            $apiRajaOngkirService = app(\App\Services\ApiRajaOngkir\ApiRajaOngkirService::class);
            $this->cities = $apiRajaOngkirService->getCities($customer['province_id']);
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
        // First, validate the form fields
        $this->validate($this->getRules(), $this->getMessages());

        try {
            // Check if a customer ID is provided
            if ($this->customer_id) {
                // Attempt to update the customer with the provided data
                $updatedCustomer = $customerService->updateCustomer($this->customer_id, $this);

                // If the customer is updated successfully
                if ($updatedCustomer) {
                    // Close the update modal
                    $this->updateModal = false;

                    // Flash a success message
                    session()->flash('success', 'Pelanggan Berhasil di Update!');

                    // Reset the form fields
                    $this->resetFields();

                    // Emit an event to notify of the updated customer
                    $this->emit('updatedCustomer', $updatedCustomer);

                    // Dispatch a browser event to close the modal
                    $this->dispatchBrowserEvent('close-modal');
                }
            }
        } catch (\Exception $e) {
            // If an exception occurs during the customer update process, flash an error message
            session()->flash('error', 'Pelanggan Gagal di Update! Error: ' . $e->getMessage());
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
        $this->postal_code = '';
        $this->phone = '';
    }
}
