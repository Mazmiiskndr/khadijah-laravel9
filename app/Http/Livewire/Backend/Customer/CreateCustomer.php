<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class CreateCustomer extends Component
{
    // Declare variable
    public $createModal = false;
    public $name, $email, $password, $address, $postal_code, $phone, $registration_date;

    // Declare Region
    public $provinces, $cities, $districts;

    // Declare Region ID
    public $province_id, $city_id, $district_id;

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
        'district_id' => 'required',
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
        'district_id.required'  => 'Kecamatan harus diisi',
        'province_id.required'  => 'Provinsi harus diisi',
        'postal_code.required'  => 'Kode Pos harus diisi',
        'phone.required'        => 'No. Telepon harus diisi',
    ];

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->resetFields();
        $this->provinces = Province::all();
    }

    public function render()
    {
        return view('livewire.backend.customer.create-customer');
    }

    /**
     * updatedProvinceId
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedProvinceId($value)
    {
        $this->cities = Regency::where('province_id', $value)->get();
        $this->reset(['city_id', 'district_id']);
    }

    /**
     * updatedCityId
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedCityId($value)
    {
        $this->districts = District::where('regency_id', $value)->get();
        $this->reset('district_id');
    }

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

    /**
     * store
     * @param  mixed $customerService
     */
    public function store(CustomerService $customerService)
    {

        // Make Validation
        $this->validate();
        $createdCustomer = $customerService->createCustomer($this);
        if ($createdCustomer instanceof Customer) {
            // Set Flash Message
            session()->flash('success', 'Pelanggan Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
            // Emit event to reload datatable
            $this->emit('customerCreated', $createdCustomer);
            $this->dispatchBrowserEvent('close-modal');
        } else {
            // Set Flash Message
            session()->flash('error', 'Pelanggan Gagal di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->createModal = false;
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
        $this->district_id = '';
        $this->postal_code = '';
        $this->phone = '';
    }
}
