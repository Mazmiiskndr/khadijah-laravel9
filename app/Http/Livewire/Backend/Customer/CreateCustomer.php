<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateCustomer extends Component
{
    // Declare variable
    public $createModal = false;
    public $name, $email, $password, $address, $city, $province, $district, $postal_code, $phone;

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
        'password' => 'required',
        'address' => 'required',
        'city_id' => 'required',
        'province_id' => 'required',
        'district_id' => 'required',
        'postal_code' => 'required',
        'phone' => 'required',
    ];

    // Make Validation message
    protected $messages = [
        'name.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email harus valid',
        'email.unique' => 'Email sudah ada',
        'password.required' => 'Password harus diisi',
        'address.required' => 'Alamat harus diisi',
        'city_id.required' => 'Kota harus diisi',
        'district_id.required' => 'Kecamatan harus diisi',
        'province_id.required' => 'Provinsi harus diisi',
        'postal_code.required' => 'Kode Pos harus diisi',
        'phone.required' => 'No. Telepon harus diisi',
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
     * store
     *
     * @return void
     */
    public function store()
    {
        // Validate input
        $this->validate();

        // Create New Customer
        $customer = Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'address' => $this->address,
            'city' => $this->city,
            'province' => $this->province,
            'postal_code' => $this->postal_code,
            'phone' => $this->phone,
        ]);

        // Emit event to reload datatable
        $this->emit('customerCreated');

        // Close Modal
        $this->closeModal();

        // Set Flash Message
        session()->flash('success', 'Customer Berhasil di Tambahkan!');
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
        $this->city = '';
        $this->province = '';
        $this->postal_code = '';
        $this->phone = '';
    }
}
