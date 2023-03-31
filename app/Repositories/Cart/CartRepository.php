<?php

namespace App\Repositories\Cart;

use LaravelEasyRepository\Repository;

interface CartRepository extends Repository{

    /**
     * getAllDataByCustomer
     *
     * @return void
     */
    public function getAllDataByCustomer($customer_id);

    /**
     * addProductToCart
     *
     * @param  mixed $uid
     * @param  mixed $customerId
     * @return void
     */
    public function addProductToCart($uid, $customerId);
}
