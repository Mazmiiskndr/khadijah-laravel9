<?php

namespace App\Http\Livewire\Backend\Setting\Contact;

use App\Models\Contact;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use Livewire\Component;

class DataContact extends Component
{
    // All the variables associated with a contact
    public $contact_id, $shop_name, $email, $address, $postal_code, $phone, $tiktok, $instagram, $facebook, $shopee, $tokped;

    // Variables associated with the region of a contact
    public $provinces, $cities, $districts;
    public $province_id, $city_id, $district_id;

    // Validation rules for updating a contact
    protected $rules = [
        'shop_name'     => 'required',
        'email'         => 'required|email',
        'address'       => 'required',
        'postal_code'   => 'required',
        'province_id'   => 'required',
        'city_id'       => 'required',
        'district_id'   => 'required',
    ];
    // Custom validation error messages
    protected $messages = [
        'shop_name.required'    => 'Nama Toko tidak boleh kosong',
        'email.required'        => 'Email tidak boleh kosong',
        'email.email'           => 'Email tidak valid',
        'address.required'      => 'Alamat tidak boleh kosong',
        'postal_code.required'  => 'Kode Pos tidak boleh kosong',
        'phone.required'        => 'No. Telepon tidak boleh kosong',
        'province_id.required'  => 'Provinsi tidak boleh kosong',
        'city_id.required'      => 'Kota / Kabupaten tidak boleh kosong',
        'district_id.required'  => 'Kecamatan tidak boleh kosong',
    ];
    // Event listeners
    protected $listeners = [
        'contactUpdated' => '$refresh',
        'getContact' => 'show'
    ];

    /**
     * The mount function is called when the component is initialized.
     * It fetches the provinces using the RajaOngkir API.
     */
    public function mount(ApiRajaOngkirService $apiRajaOngkirService)
    {
        $contact = Contact::first();

        $this->provinces = $apiRajaOngkirService->getProvinces();
        $this->cities = collect();
        $this->show($contact);
    }

    /**
     * The render function is responsible for viewing the component.
     */
    public function render()
    {
        return view('livewire.backend.setting.contact.data-contact');
    }

    /**
     * The show function is used to fetch a contact and assign its properties to the public variables.
     */
    public function show($contact)
    {
        // Assign the properties of contact to the public variables
        foreach ($contact->getAttributes() as $attribute => $value) {
            if (property_exists($this, $attribute)) {
                $this->{$attribute} = $value;
            }
        }

        // If a city is selected, populate the city field and fetch the cities belonging to the selected province
        if (!is_null($contact->city_id)) {
            $this->city_id = $contact->city_id;
            $this->cities = $this->getCities($contact->province_id);
        }

        // If a district is selected, populate the district field and fetch the districts belonging to the selected city
        if (!is_null($contact->district_id)) {
            $this->district_id = $contact->district_id;
            $this->districts = $this->getDistricts($contact->city_id);
        }
    }

    /**
     * The update function is responsible for validating the request and updating the contact.
     */
    public function update()
    {
        $this->validate();

        // Update the contact
        $contact = Contact::find($this->contact_id);
        $dataDistrict = $this->getDistrictById($this->district_id);
        $cityName = $dataDistrict['type'] . " " . $dataDistrict['city'];
        $provinceName =  $dataDistrict['province'];
        $districtName =  $dataDistrict['subdistrict_name'];
        $contact->update([
            'shop_name'     => $this->shop_name,
            'email'         => $this->email,
            'address'       => $this->address,
            'province_id'   => $this->province_id,
            'city_id'       => $this->city_id,
            'district_id'   => $this->district_id,
            'province'      => $provinceName,
            'city'          => $cityName,
            'district'      => $districtName,
            'postal_code'   => $this->postal_code,
            'phone'         => $this->phone,
            'tiktok'        => $this->tiktok,
            'instagram'     => $this->instagram,
            'facebook'      => $this->facebook,
            'shopee'        => $this->shopee,
            'tokped'        => $this->tokped,
        ]);

        // Set flash message and emit event
        session()->flash('success', 'Data Kontak Berhasil di Update!');
        $this->emit('updateContact');
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
     * This function is triggered whenever a property is updated.
     * It validates the updated property.
     */
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    /**
     * Calls the RajaOngkir API to get a list of cities.
     * @param  mixed $provinceId The ID of the selected province.
     * @return Collection
     */
    protected function getCities($provinceId)
    {
        // Resolve the API service from the service container
        return app(ApiRajaOngkirService::class)->getCities($provinceId);
    }

    /**
     * Calls the RajaOngkir API to get a list of districts.
     * @param  mixed $cityId The ID of the selected city.
     * @return Collection
     */
    protected function getDistricts($cityId)
    {
        // Resolve the API service from the service container
        return app(ApiRajaOngkirService::class)->getSubDistrictByCity($cityId);
    }

    /**
     * Calls the RajaOngkir API to get a list of district by ID.
     * @param  mixed $cityId The ID of the.
     * @return Collection
     */
    protected function getDistrictById($districtId)
    {
        // Resolve the API service from the service container
        return app(ApiRajaOngkirService::class)->getSubDistrictById($districtId);
    }
}
