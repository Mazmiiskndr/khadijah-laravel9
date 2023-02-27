<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use LaravelEasyRepository\Repository;

interface CustomerRepository extends Repository{

    public function findById(int $id): ?Customer;
    public function findByEmail(string $email): ?Customer;
    public function save(Customer $customer): void;
}
