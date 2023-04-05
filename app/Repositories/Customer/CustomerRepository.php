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


    /**
     * findByUid
     */
    public function findByUid($uid);


    /**
     * createCustomer
     * @param  mixed $data
     */
    public function createCustomer($data);

    /**
     * updateCustomer
     * @param  mixed $customer_id
     * @param  mixed $data
     */
    public function updateCustomer($customer_id,$data);
}
