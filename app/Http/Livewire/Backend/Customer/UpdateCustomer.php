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

    public function render()
    {
        return view('livewire.backend.customer.update-customer');
    }

    /**
     * updatedProvinceId
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedProvinceId($value)
    {
        $apiRajaOngkirService = app(\App\Services\ApiRajaOngkir\ApiRajaOngkirService::class);
        $this->cities = $apiRajaOngkirService->getCities($value);
        $this->reset(['city_id']);
        // $this->selectedCity = null;
    }


    /**
     * show
     *
     * @param  mixed $customer
     * @return void
     */
    public function show($customer)
    {
        $this->updateModal = true;
        $this->customer_id = $customer['id'];
        $this->name = $customer['name'];
        $this->email = $customer['email'];
        $this->address = $customer['address'];
        $this->province_id = $customer['province_id'];

        // set value for city dropdown
        if (!is_null($customer['city_id'])) {
            $this->city_id = $customer['city_id'];
            $apiRajaOngkirService = app(\App\Services\ApiRajaOngkir\ApiRajaOngkirService::class);
            $this->cities = $apiRajaOngkirService->getCities($customer['province_id']);
        }

        $this->postal_code = $customer['postal_code'];
        $this->phone = $customer['phone'];
    }

    /**
     * update
     * @param  mixed $customerService
     */
    public function update(CustomerService $customerService)
    {
        // Create Validate
        $this->validate($this->getRules(), $this->getMessages());

        if ($this->customer_id) {
            $updatedCustomer = $customerService->updateCustomer($this->customer_id, $this);
            // dd($updatedCustomer);
            if ($updatedCustomer) {
                $this->updateModal = false;
                // Set Flash Message
                session()->flash('success', 'Pelanggan Berhasil di Update!');
                $this->resetFields();
                // make emit with flash message
                $this->emit('updatedCustomer', $updatedCustomer);
                $this->dispatchBrowserEvent('close-modal');
            }
        }
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->updateModal = false;
        $this->resetFields();
    }

    /**
     * resetFields
     *
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
