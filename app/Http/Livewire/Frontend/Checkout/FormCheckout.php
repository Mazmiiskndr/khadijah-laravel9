<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Services\Cart\CartService;
use App\Services\Customer\CustomerService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Termwind\Components\Dd;

class FormCheckout extends Component
{
    // Declare variable
    public $customer_uid, $name, $email, $address, $postal_code, $phone;

    // Declare Region
    public $provinces, $cities, $districts;

    // Declare Region ID
    public $province_id, $city_id, $district_id;

    // Selected Region
    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->customer_uid = Auth::guard('customer')->user()->customer_uid;
        $this->showCustomer($this->customer_uid);
        $this->provinces = Province::all();
        $this->cities = collect();
        $this->districts = collect();
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
     * render
     */
    public function render(CartService $cartService)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        return view('livewire.frontend.checkout.form-checkout', [
            'carts' => $cartService->getAllDataByCustomer($customer_id),
        ]);
    }

    /**
     * showCustomer
     *
     * @return void
     */
    public function showCustomer($customer_uid)
    {
        $customer = Customer::with('province', 'city', 'district', 'rekening_customers')->where('customer_uid', $customer_uid)->first();
        $this->customer_uid = $customer->customer_uid;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->province_id = $customer->province_id;
        $this->city_id = $customer->city_id;
        $this->district_id = $customer->district_id;
        $this->address = $customer->address;
        $this->postal_code = $customer->postal_code;
        $this->phone = $customer->phone;
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

    // *** TODO: ***
    /**
     * resetFields
     *
     * @return void
     */
    // public function resetFields()
    // {
    //     $this->name = '';
    //     $this->email = '';
    //     $this->password = '';
    //     $this->address = '';
    //     $this->city_id = '';
    //     $this->province_id = '';
    //     $this->district_id = '';
    //     $this->postal_code = '';
    //     $this->phone = '';
    // }
}
