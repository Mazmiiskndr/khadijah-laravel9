<?php

namespace App\Http\Livewire\Frontend\Profile;

use Livewire\Component;

class DashboardAccount extends Component
{
    public $customer;
    protected $listeners = [
        'updatedCustomer' => 'handleUpdated',
    ];

    public function render()
    {
        return view('livewire.frontend.profile.dashboard-account');
    }

    /**
     * handleUpdated
     *
     * @return void
     */
    public function handleUpdated()
    {
        //
    }
}
