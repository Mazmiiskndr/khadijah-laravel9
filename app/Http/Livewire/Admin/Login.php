<?php

namespace App\Http\Livewire\Admin;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $password;
    public $email;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'Email harus diisi!',
        'email.email' => 'Format harus email!',
        'password.required' => 'Password harus diisi!',
    ];

    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }
    public function loginAdmin()
    {
        $this->validate();
        if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])) {
            // login berhasil untuk User
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            // login gagal
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
        }
    }
    public function render()
    {
        return view('livewire.admin.login');
    }
}
