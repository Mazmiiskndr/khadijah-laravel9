<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class CreateCustomer extends Component
{
    // Declare variable
    public $createModal = false;
    public $name, $email, $password, $address, $postal_code, $phone, $registration_date;

    // Declare Region
    public $provinces, $cities;

    // Declare Region ID
    public $province_id, $city_id;

    // Listeners
    protected $listeners = [
        'customerCreated' => '$refresh',
    ];

    // Rules Validation
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:customer,email',
        'password' => 'required|min:6',
        'address' => 'required',
        'city_id' => 'required',
        'province_id' => 'required',
        'postal_code' => 'required',
        'phone' => 'required',
    ];

    // Make Validation message
    protected $messages = [
        'name.required'         => 'Nama harus diisi',
        'email.required'        => 'Email harus diisi',
        'email.email'           => 'Email harus valid',
        'email.unique'          => 'Email telah digunakan oleh pelanggan lain',
        'password.required'     => 'Password harus diisi',
        'password.min'          => 'Password harus memiliki setidaknya 6 karakter',
        'address.required'      => 'Alamat harus diisi',
        'city_id.required'      => 'Kota harus diisi',
        'province_id.required'  => 'Provinsi harus diisi',
        'postal_code.required'  => 'Kode Pos harus diisi',
        'phone.required'        => 'No. Telepon harus diisi',
    ];


    /**
     * This function mounts the ApiRajaOngkirService and fetches a list of provinces.
     * @param ApiRajaOngkirService $apiRajaOngkirService An instance of the service class for RajaOngkir API interactions.
     */
    public function mount(ApiRajaOngkirService $apiRajaOngkirService)
    {
        // Reset form fields to their default values
        $this->resetFields();

        // Fetch a list of provinces
        $this->provinces = $apiRajaOngkirService->getProvinces();
    }

    /**
     * Renders the 'livewire.backend.customer.create-customer' view.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.backend.customer.create-customer');
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
     * Triggers form validation when a property changes.
     *
     * @param  mixed $property The name of the property that has been updated.
     * @return void
     */
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    /**
     * Stores a new customer.
     * @param  CustomerService $customerService The service instance for customer interactions.
     * @return void
     */
    public function store(CustomerService $customerService)
    {
        // First, validate the form fields
        $this->validate();

        try {
            // Attempt to create a new customer with the provided data
            $createdCustomer = $customerService->createCustomer($this);

            // Check if the returned object is an instance of the Customer class
            if ($createdCustomer instanceof Customer
            ) {
                // If the customer was created successfully, flash a success message
                session()->flash('success', 'Pelanggan Berhasil di Tambahkan!');

                // Emit an event to reload the data table
                $this->emit('customerCreated', $createdCustomer);

                // Dispatch a browser event to close the modal
                $this->dispatchBrowserEvent('close-modal');
            } else {
                // If the returned object is not a Customer instance, flash an error message
                session()->flash('error', 'Pelanggan Gagal di Tambahkan!');
            }
        } catch (\Exception $e) {
            // If an exception occurs during the customer creation process, flash an error message
            session()->flash('error', 'Pelanggan Gagal di Tambahkan! Error: ' . $e->getMessage());
        }

        // Regardless of the outcome, reset the form fields to their default values
        $this->resetFields();
    }


    /**
     * Closes the create modal.
     * @return void
     */
    public function closeModal()
    {
        // Close the create modal
        $this->createModal = false;

        // Reset the form fields
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
