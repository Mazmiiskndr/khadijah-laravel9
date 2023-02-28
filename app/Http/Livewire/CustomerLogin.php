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
    public function submit()
    {

        $this->validate();


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

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

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
