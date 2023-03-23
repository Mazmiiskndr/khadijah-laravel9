<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use Livewire\Component;

class InformationAccount extends Component
{
    public $customer;
    protected $listeners = [
        'updatedCustomer' => 'handleUpdated',
    ];

    public function render()
    {
        return view('livewire.frontend.profile.information-account');
    }

    /**
     * getCustomer
     *
     * @param  mixed $customer_id
     * @return void
     */
    public function getCustomer($customer_id)
    {
        $customer = Customer::with('province', 'city', 'district')->find($customer_id);
        $this->emit('getCustomer', $customer);
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
