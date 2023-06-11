<?php

namespace App\Http\Livewire\Frontend\Profile;

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
     * @param  mixed $customer_uid
     * @return void
     */
    public function getCustomerAdress($customer_uid)
    {
        $customerService = app(\App\Services\Customer\CustomerService::class);
        $customerData = $customerService->findByUid($customer_uid);
        $this->emit('getCustomerAddress', $customerData);
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
