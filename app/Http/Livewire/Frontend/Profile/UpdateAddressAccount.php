<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Livewire\Component;

class UpdateAddressAccount extends Component
{
    // UpdateModal
    public $updateModal = false;
    // Declare variable
    public $customer_id,$address, $postal_code;

    // Declare Region
    public $provinces, $cities, $districts;

    // Declare Region ID
    public $province_id, $city_id, $district_id;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;

    // Listeners
    protected $listeners = [
        'customerAddressUpdated' => '$refresh',
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
            'district_id'   => 'required',
            'postal_code'   => 'required',
        ];
    }

    // Make Validation message
    protected function getMessages()
    {
        return [
            'address.required'      => 'Alamat harus diisi',
            'city_id.required'      => 'Kota harus diisi',
            'district_id.required'  => 'Kecamatan harus diisi',
            'province_id.required'  => 'Provinsi harus diisi',
            'postal_code.required'  => 'Kode Pos harus diisi',
        ];
    }

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
        return view('livewire.frontend.profile.update-address-account');
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
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        // Create Validate
        $this->validate($this->getRules(), $this->getMessages());

        if ($this->customer_id) {
            $customer = Customer::find($this->customer_id);
            $customerData = [
                'address' => $this->address,
                'city_id' => $this->city_id,
                'district_id' => $this->district_id,
                'province_id' => $this->province_id,
                'postal_code' => $this->postal_code,
            ];
            $customer->update($customerData);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Alamat Berhasil di Update!');
            $this->resetFields();

            // buatkan emit dengan flash message
            $this->emit('updatedCustomerAddress', $customer);
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
        $this->address = '';
        $this->city_id = '';
        $this->province_id = '';
        $this->district_id = '';
        $this->postal_code = '';
    }

}
