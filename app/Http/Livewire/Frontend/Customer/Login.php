<?php

namespace App\Http\Livewire\Frontend\Customer;

use App\Models\Customer;
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
        'password.required' => 'Kata Sandi harus diisi!',
    ];

    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }
    public function submit()
    {
        $this->validate();

        // Search Customer By Email
        $customer = Customer::where('email', $this->email)->first();

        // If the customer is found, try authentication
        if ($customer) {
            if (Auth::guard('customer')->attempt(['email' => $this->email, 'password' => $this->password])) {
                // Login Success
                return redirect('');
            } else {
                // login failed
                session()->flash('error', 'Alamat Email atau Password Anda salah!.');
            }
        } else {
            // Customer not registered
            session()->flash('error', 'Anda belum terdaftar, silahkan daftar terlebih dahulu.');
        }
    }


    public function render()
    {
        return view('livewire.frontend.customer.login');
    }
}
