<?php

namespace App\Http\Livewire\Backend\Setting\Contact;

use App\Models\Contact;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Livewire\Component;

class DataContact extends Component
{
    // Declare Variable
    public $contact_id, $shop_name, $email, $address,
            $postal_code, $phone, $tiktok,
            $instagram, $facebook, $shopee,
            $tokped;

    // Declare Region
    public $provinces, $cities, $districts;

    // Declare Region ID
    public $province_id, $city_id, $district_id;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;

    // Make rules for updated
    protected $rules = [
        'shop_name'     => 'required',
        'email'         => 'required|email',
        'address'       => 'required',
        // 'city_id'       => 'nullable',
        // 'province_id'   => 'nullable',
        // 'district_id'   => 'nullable',
        'postal_code'   => 'required',
        'phone'         => 'required',
    ];
    // Messages
    protected $messages = [
        'shop_name.required'    => 'Nama Toko tidak boleh kosong',
        'email.required'        => 'Email tidak boleh kosong',
        'email.email'           => 'Email tidak valid',
        'address.required'      => 'Alamat tidak boleh kosong',
        // 'city_id.required'      => 'Kota tidak boleh kosong',
        // 'province_id.required'  => 'Provinsi tidak boleh kosong',
        // 'district_id.required'  => 'Kecamatan tidak boleh kosong',
        'postal_code.required'  => 'Kode Pos tidak boleh kosong',
        'phone.required'        => 'No. Telepon tidak boleh kosong',
    ];

    // Buatkan listeners untuk refresh
    protected $listeners = [
        'contactUpdated' => '$refresh',
        'getContact' => 'show'
    ];


    /**
     * mount
     *
     * @return void
     */

    //  *** TODO: City and District not working ***
    public function mount()
    {
        $this->provinces    = Province::all();
        $this->cities       = collect();
        $this->districts    = collect();
        $contact            = Contact::with('province', 'city', 'district')->first();
        $this->show($contact);
    }

    public function render()
    {
        return view('livewire.backend.setting.contact.data-contact');
    }

    public function show($contact)
    {
        $this->contact_id   = $contact->contact_id;
        $this->shop_name    = $contact->shop_name;
        $this->email        = $contact->email;
        $this->address      = $contact->address;
        $this->postal_code  = $contact->postal_code;
        $this->phone        = $contact->phone;
        $this->tiktok       = $contact->tiktok;
        $this->instagram    = $contact->instagram;
        $this->facebook     = $contact->facebook;
        $this->shopee       = $contact->shopee;
        $this->tokped       = $contact->tokped;

        $this->province_id  = $contact->province_id;
        $this->city_id      = $contact->city_id;
        $this->district_id  = $contact->district_id;
        if (!is_null($contact->province_id)) {
            $this->cities   = Regency::where('province_id', $contact->province_id)->get();
        }
        if (!is_null($contact->city_id)) {
            $this->districts = District::where('regency_id', $contact->city_id)->get();
        }
    }

    // buatkan function updatenya
    public function update()
    {
        $this->validate();
        $contact = Contact::find($this->contact_id);
        $contact->update([
            'shop_name'     => $this->shop_name,
            'email'         => $this->email,
            'address'       => $this->address,
            'city_id'       => $this->city_id,
            'province_id'   => $this->province_id,
            'district_id'   => $this->district_id,
            'postal_code'   => $this->postal_code,
            'phone'         => $this->phone,
            'tiktok'        => $this->tiktok,
            'instagram'     => $this->instagram,
            'facebook'      => $this->facebook,
            'shopee'        => $this->shopee,
            'tokped'        => $this->tokped,
        ]);
        // Set Flash Message
        session()->flash('success', 'Data Kontak Berhasil di Update!');
        $this->emit('updateContact');
    }

    /**
     * updatedProvinceId
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedProvinceId($value)
    {
        // dd($value);
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
}
