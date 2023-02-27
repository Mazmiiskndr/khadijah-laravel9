<?php

namespace App\Http\Livewire;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerLogin extends Component
{
    public $password;
    public $email;

    // protected $rules = [
    //     'email' => 'required|email',
    //     'password' => 'required|min:6',
    // ];

    public function submit()
    {

        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);

        if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])) {
            // login berhasil untuk User
            return redirect()->intended(RouteServiceProvider::HOME);
        } else
        if (Auth::guard('customer')->attempt(['email' => $this->email, 'password' => $this->password])) {
            // login berhasil untuk Customer
            // *** TODO: ***
            return redirect('');
        } else {
            // login gagal
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
        }
    }

    // *** TODO: ***
    // public function submit()
    // {
    //     $this->validate();

    //     // Execution doesn't reach here if validation fails.

    //     Customer::create([
    //         'email' => $this->email,
    //         'password' => $this->password,
    //     ]);

    //     // $validatedData = $this->validate(
    //     //     ['email' => 'required|email'],
    //     //     [
    //     //         'email.required' => 'The :attribute cannot be empty.',
    //     //         'email.email' => 'The :attribute format is not valid.',
    //     //     ],
    //     //     ['email' => 'Email Address']
    //     // );

    //     // Customer::create($validatedData);
    // }
    public function render()
    {
        return view('livewire.customer-login');
    }
}
