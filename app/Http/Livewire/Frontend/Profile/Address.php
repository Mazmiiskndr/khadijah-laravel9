<?php

namespace App\Http\Livewire\Frontend\Profile;

use Livewire\Component;

class Address extends Component
{
    public $customer, $addressCustomer, $provinceCustomer, $cityCustomer, $districtCustomer;

    protected $listeners = [
        'updatedCustomerAddress' => 'handleAddressUpdated',
        'updatedCustomer' => 'handleUpdated',
    ];

    public function mount()
    {
        $this->addressCustomer = $this->customer->address ? $this->customer->address : "-";
        $this->provinceCustomer = $this->customer->province_id ? ucwords(strtolower($this->customer->province)) : "-";
        $this->cityCustomer = $this->customer->city_id ? ucwords(strtolower($this->customer->city)) : "-";
        $this->districtCustomer = $this->customer->district_id ? ucwords(strtolower($this->customer->district)) : "-";
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
        $this->addressCustomer = $customerData->address ? $customerData->address : "-";
        $this->provinceCustomer = $customerData->province_id ? ucwords(strtolower($customerData->province)) : "-";
        $this->cityCustomer = $customerData->city_id ? ucwords(strtolower($customerData->city)) : "-";
        $this->districtCustomer = $customerData->district_id ? ucwords(strtolower($customerData->district)) : "-";
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
