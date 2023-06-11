<?php

namespace App\Http\Livewire\Frontend\Profile;

use Livewire\Component;

class Address extends Component
{
    public $customer, $addressCustomer, $provinceCustomer, $cityCustomer, $typeRegency;

    protected $listeners = [
        'updatedCustomerAddress' => 'handleAddressUpdated',
        'updatedCustomer' => 'handleUpdated',
    ];

    public function mount()
    {
        $this->addressCustomer = $this->customer->address ? $this->customer->address : "-";
        $this->provinceCustomer = $this->customer->province_id ? ucwords(strtolower($this->customer->provinceAndCity['province'])) : "-";
        $this->cityCustomer = $this->customer->city_id ? ucwords(strtolower($this->customer->provinceAndCity['city_name'])) : "-";
        $this->typeRegency = $this->customer->city_id ? ucwords(strtolower($this->customer->provinceAndCity['type'])) : "-";
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
     * Handler function for the 'updatedCustomerAddress' event.
     * @param Customer $updatedCustomer The updated customer object
     */
    public function handleAddressUpdated($updatedCustomer)
    {
        $customerService = app(\App\Services\Customer\CustomerService::class);
        $customerData = $customerService->findByUid($updatedCustomer['customer_uid']);
        // We could, for example, update the local state of the component with the new customer data
        $this->addressCustomer = $customerData->address;
        $this->provinceCustomer = ucwords(strtolower($customerData->provinceAndCity['province']));
        $this->cityCustomer = ucwords(strtolower($customerData->provinceAndCity['city_name']));
        $this->typeRegency = ucwords(strtolower($customerData->provinceAndCity['type']));
    }


    /**
     * handleUpdated
     * @return void
     */
    public function handleUpdated()
    {
        // code..
    }

}
