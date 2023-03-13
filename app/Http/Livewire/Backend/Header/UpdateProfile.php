<?php

namespace App\Http\Livewire\Backend\Header;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateProfile extends Component
{
    // UpdateModal
    public $updateModal = false;
    // Declare variable
    public $user_id,$name,$email,$password;
    // Listeners
    protected $listeners = [
        'userUpdated' => '$refresh',
        'getUser' => 'show'
    ];

    // Rules Validation
    protected function getRules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email,' . $this->user_id . '',
            'password'      => 'nullable|min:6,' . $this->user_id . '',
        ];
    }

    // Make Validation message
    protected function getMessages()
    {
        return [
            'name.required'         => 'Nama harus diisi',
            'email.required'        => 'Email harus diisi',
            'email.email'           => 'Email harus valid',
            'email.unique'          => 'Email telah digunakan oleh Admin lain',
        ];
    }

    public function render()
    {
        return view('livewire.backend.header.update-profile');
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

    public function show($user)
    {
        $this->updateModal = true;
        $this->user_id = $user['id'];
        $this->name = $user['name'];
        $this->email = $user['email'];
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        // Create Validate
        $this->validate($this->getRules(), $this->getMessages());

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $userData = [
                'name' => $this->name,
                'email' => $this->email,
            ];
            if (!empty($this->password)) {
                $userData['password'] = Hash::make($this->password);
            }
            $user->update($userData);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Akun Berhasil di Update!');
            $this->resetFields();
            // buatkan emit dengan flash message
            $this->emit('updatedUser', $user);
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->updateModal = false;
        $this->resetFields();
    }

    /**
     * resetFields
     *
     * @return void
     */
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

}
