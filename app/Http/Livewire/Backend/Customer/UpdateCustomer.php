<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateCustomer extends Component
{
    // Declare variable
    public $updateModal = false;
    public $customer_id, $name, $email, $password, $address, $postal_code, $phone, $registration_date;

    // Declare Region
    public $provinces, $cities, $districts;

    // Declare Region ID
    public $province_id, $city_id, $district_id;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;

    // Listeners
    protected $listeners = [
        'customerUpdated' => '$refresh',
        'getCustomer' => 'show'
    ];

    // Rules Validation
    // *** TODO: Password and Email Validation***
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        // 'password' => 'required|min:6',
        'address' => 'required',
        'city_id' => 'required',
        'province_id' => 'required',
        'district_id' => 'required',
        'postal_code' => 'required',
        'phone' => 'required',
    ];

    // Make Validation message
    // *** TODO: Password and Email Validation***
    protected $messages = [
        'name.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email harus valid',
        // 'password.required' => 'Password harus diisi',
        // 'password.min' => 'Password harus memiliki setidaknya 6 karakter',
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
        $this->cities = collect();
        $this->districts = collect();
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
        $this->cities = Regency::where('province_id', $value)->get();
        $this->reset(['city_id', 'district_id']);
        // $this->selectedCity = null;
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
            $this->cities = Regency::where('province_id', $customer['province_id'])->get(); // trigger method to load city options
            $this->districts = District::where('regency_id', $customer['city_id'])->get(); // set selected value for city dropdown
        }

        // set value for district dropdown
        if (!is_null($customer['district_id'])) {
            $this->district_id = $customer['district_id'];
        }

        $this->postal_code = $customer['postal_code'];
        $this->phone = $customer['phone'];
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        // buatkan validate dengan message error harus diisi
        $this->validate();

        if ($this->customer_id) {
            $customer = Customer::find($this->customer_id);
            $customer->update([
                'name' => $this->name,
                'email' => $this->email,
                // 'password' => Hash::make($this->password),
                'address' => $this->address,
                'city_id' => $this->city_id,
                'district_id' => $this->district_id,
                'province_id' => $this->province_id,
                'postal_code' => $this->postal_code,
                'phone' => $this->phone,
            ]);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Kategori Berhasil di Update!');
            $this->resetFields();
            // buatkan emit dengan flash message
            $this->emit('updatedCustomer', $customer);
            $this->dispatchBrowserEvent('close-modal');
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
        $this->district_id = '';
        $this->postal_code = '';
        $this->phone = '';
    }
}
