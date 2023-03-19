<?php

namespace App\Http\Livewire\Frontend\Customer;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    // Declare variable
    public $name, $email, $password, $phone, $registration_date;

    // Listeners
    protected $listeners = [
        'customerCreated' => '$refresh',
    ];

    // Rules Validation
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:customer,email',
        'password' => 'required|min:6',
        'phone' => 'required',
    ];

    // Make Validation message
    protected $messages = [
        'name.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email harus valid',
        'email.unique' => 'Email telah digunakan oleh pelanggan lain',
        'password.required' => 'Password harus diisi',
        'password.min' => 'Password harus memiliki setidaknya 6 karakter',
        'phone.required' => 'No. Telepon harus diisi',
    ];

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->resetFields();
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

    public function render()
    {
        return view('livewire.frontend.customer.register');
    }

    /**
     * submit
     *
     * @return void
     */
    public function submit()
    {
        // Validate Form Request
        $this->validate();
        $regisDate = Carbon::now()->format('Y-m-d h:i:s');
        $this->registration_date = $regisDate;
        // dd($this->registration_date);
        try {
            // Create New Customer
            Customer::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'phone' => $this->phone,
                'registration_date' => $this->registration_date,
            ]);

            // Reset Form Fields After Creating Category
            $this->resetFields();
            // Redirect to Customer Index
            return redirect()->route('customer.login')->with('success', 'Register Berhasil. Silahkan Login!');
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error', 'Register Gagal!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
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
        $this->phone = '';
    }
}
