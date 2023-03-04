<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use LaravelEasyRepository\Repository;

interface CustomerRepository extends Repository{

    /**
     * Get All Categories
     *
     * @return void
     */
    public function getAllData();
}
