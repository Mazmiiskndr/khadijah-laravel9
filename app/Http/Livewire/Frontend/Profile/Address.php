<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use Livewire\Component;

class Address extends Component
{
    public $customer, $addressCustomer, $provinceCustomer, $cityCustomer;

    protected $listeners = [
        'updatedCustomerAddress' => 'handleAddressUpdated',
        'updatedCustomer' => 'handleUpdated',
    ];

    public function mount()
    {
        $this->addressCustomer = $this->customer->address ? $this->customer->address : "-";
        $this->provinceCustomer = $this->customer->province_id ? ucwords(strtolower($this->customer->provinceAndCity['province'])) : "-";
        $this->cityCustomer = $this->customer->city_id ? ucwords(strtolower($this->customer->provinceAndCity['city_name'])) : "-";
    }

    public function render()
    {
        return view('livewire.frontend.profile.address');
    }

    /**
     * getCustomerAdress
     * @param  mixed $customer_id
     * @return void
     */
    public function getCustomerAdress($customer_id)
    {
        $customer = Customer::with('province', 'city', 'district')->find($customer_id);
        $this->emit('getCustomerAddress', $customer);
    }

    /**
     * handleAddressUpdated
     *
     * @return void
     */
    public function handleAddressUpdated()
    {
        // code..
    }

    /**
     * handleUpdated
     *
     * @return void
     */
    public function handleUpdated()
    {
        // code..
    }

}
