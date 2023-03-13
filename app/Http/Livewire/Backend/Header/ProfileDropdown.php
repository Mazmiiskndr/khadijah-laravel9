<?php

namespace App\Http\Livewire\Backend\Header;

use App\Models\User;
use Livewire\Component;

class ProfileDropdown extends Component
{
    protected $listeners = [
        'updatedUser' => 'handleUpdated',
    ];
    public function render()
    {
        return view('livewire.backend.header.profile-dropdown');
    }

    /**
     * getUser
     *
     * @param  mixed $user_id
     * @return void
     */
    public function getUser($user_id)
    {
        $user = User::find($user_id);
        $this->emit('getUser', $user);
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
