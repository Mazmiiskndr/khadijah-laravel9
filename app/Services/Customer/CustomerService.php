<?php

namespace App\Services\Customer;

use LaravelEasyRepository\BaseService;
use App\Models\Customer;
interface CustomerService extends BaseService{
    public function attemptLogin(string $email, string $password);
    public function login(array $credentials): bool;
    public function createCustomer(array $data): Customer;
    public function updateCustomer(Customer $customer, array $data): Customer;
    public function deleteCustomer(Customer $customer): void;
}
