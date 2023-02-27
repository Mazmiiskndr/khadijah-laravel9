<?php

namespace App\Services\Customer;

use LaravelEasyRepository\Service;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CustomerServiceImplement extends Service implements CustomerService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(CustomerRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function attemptLogin(string $email, string $password)
    {
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::guard('customer')->attempt($credentials)) {
            return true;
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    // Define your custom methods :)
}
