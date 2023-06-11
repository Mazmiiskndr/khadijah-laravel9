<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class InformationAccount extends Component
{
    public $customer, $addressCustomer, $provinceCustomer, $cityCustomer;
    protected $listeners = [
        'updatedCustomer' => 'handleUpdated',
        'updatedCustomerAddress' => 'handleAddressUpdated',
    ];

    public function mount()
    {
        $this->addressCustomer = $this->customer->address ? $this->customer->address : "-";
        $this->provinceCustomer = $this->customer->province_id ? ucwords(strtolower($this->customer->provinceAndCity['province'])) : "-";
        $this->cityCustomer = $this->customer->city_id ? ucwords(strtolower($this->customer->provinceAndCity['city_name'])) : "-";
    }

    public function render()
    {
        return view('livewire.frontend.profile.information-account');
    }

    /**
     * getCustomer
     *
     * @param  mixed $customer_uid
     * @return void
     */
    public function getCustomer($customer_uid)
    {
        $customerService = app(\App\Services\Customer\CustomerService::class);
        $customerData = $customerService->findByUid($customer_uid);
        $this->emit('getCustomer', $customerData);
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

    /**
     * handleAddressUpdated
     *
     * @return void
     */
    public function handleAddressUpdated()
    {
        // code..
    }
}
