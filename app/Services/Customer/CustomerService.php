<?php

namespace App\Services\Customer;

use LaravelEasyRepository\BaseService;
use App\Models\Customer;
interface CustomerService extends BaseService{
    /**
     * Get All Data Categories
     *
     * @return void
     */
    public function getAllData();
}
