<?php

namespace App\Http\Livewire\Admin;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    // Variables to store user inputs
    public $password;
    public $email;

    // Rules for form validation
    protected $rules = [
        'email' => 'required|email',  // Email must be filled and valid
        'password' => 'required',     // Password must be filled
    ];

    // Custom messages for form validation errors
    protected $messages = [
        'email.required' => 'Email tidak boleh kosong!',
        'email.email' => 'Email harus valid!',
        'password.required' => 'Kata Sandi harus diisi!',
    ];

    /**
     * Event listener for live-validation of form fields.
     * @param  string $property Name of the property that got updated
     * @return void
     */
    public function updated($property)
    {
        // Validate only the property that has been updated
        $this->validateOnly($property);
    }

    /**
     * Handle the form submission for admin login.
     * @return void
     */
    public function loginAdmin()
    {
        // Validate the form fields
        $credentials = $this->validate();

        // Attempt to login the user
        if (Auth::guard('web')->attempt($credentials)) {
            // Successful login, redirect user to intended page
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            // Failed login, flash error message
            session()->flash('error', 'Alamat Email atau Kata Sandi Anda salah.');
        }
    }

    /**
     * Render the component.
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        // Render the login view
        return view('livewire.admin.login');
    }
}
