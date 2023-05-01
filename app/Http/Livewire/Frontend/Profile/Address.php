<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use Livewire\Component;

class Address extends Component
{
    public $customer;

    protected $listeners = [
        'updatedCustomerAddress' => 'handleAddressUpdated',
        'updatedCustomer' => 'handleUpdated',
    ];

    public function render()
    {
        return view('livewire.frontend.profile.address');
    }

    /**
     * getCustomerAdress
     *
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
