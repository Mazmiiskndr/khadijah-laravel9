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
    public $provinces, $cities;
    public $province_id, $city_id;

    // Validation rules for updating a contact
    protected $rules = [
        'shop_name'     => 'required',
        'email'         => 'required|email',
        'address'       => 'required',
        'postal_code'   => 'required',
        'phone'         => 'required',
    ];
    // Custom validation error messages
    protected $messages = [
        'shop_name.required'    => 'Nama Toko tidak boleh kosong',
        'email.required'        => 'Email tidak boleh kosong',
        'email.email'           => 'Email tidak valid',
        'address.required'      => 'Alamat tidak boleh kosong',
        'postal_code.required'  => 'Kode Pos tidak boleh kosong',
        'phone.required'        => 'No. Telepon tidak boleh kosong',
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
            $apiRajaOngkirService = app(ApiRajaOngkirService::class);
            $this->cities = $apiRajaOngkirService->getCities($contact->province_id);
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
        $contact->update([
            'shop_name'     => $this->shop_name,
            'email'         => $this->email,
            'address'       => $this->address,
            'city_id'       => $this->city_id,
            'province_id'   => $this->province_id,
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
     * This function is triggered when the province_id property is updated.
     * It fetches the cities that belong to the selected province.
     */
    public function updatedProvinceId($value)
    {
        $apiRajaOngkirService = app(ApiRajaOngkirService::class);
        $this->cities = $apiRajaOngkirService->getCities($value);
        $this->reset(['city_id']);
    }

    /**
     * This function is triggered whenever a property is updated.
     * It validates the updated property.
     */
    public function updated($property)
    {
        $this->validateOnly($property);
    }
}
