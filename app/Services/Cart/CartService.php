<?php

namespace App\Services\Cart;

use LaravelEasyRepository\BaseService;

interface CartService extends BaseService{

    /**
     * getAllDataByCustomer
     *
     * @return void
     */
    public function getAllDataByCustomer($customer_id);

    /**
     * addProductToCart
     * @param  mixed $uid
     * @param  mixed $customerId
     * @param  mixed $data
     */
    public function addProductToCart($uid, $customerId, $data);
}
