<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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
     *
     * @return void
     */
    public function store()
    {
        // Validate Form Request
        $this->validate();
        $regisDate = Carbon::now()->format('Y-m-d h:i:s');
        $this->registration_date = $regisDate;
        try {
            // Create New Customer
            $customer = Customer::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'address' => $this->address,
                'city_id' => $this->city_id,
                'district_id' => $this->district_id,
                'province_id' => $this->province_id,
                'postal_code' => $this->postal_code,
                'phone' => $this->phone,
                'registration_date' => $this->registration_date,
            ]);
            // Set Flash Message
            session()->flash('success', 'Pelanggan Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
            // Emit event to reload datatable
            $this->emit('customerCreated', $customer);
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Exception $e) {
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
