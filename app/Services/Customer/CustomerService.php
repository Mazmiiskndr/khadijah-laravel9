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
    public function updateCustomer($customer_id, $data);

    /**
     * updateCustomerAddress
     * @param  mixed $customer_id
     * @param  mixed $data
     */
    public function updateCustomerAddress($customer_id, $data);

}
