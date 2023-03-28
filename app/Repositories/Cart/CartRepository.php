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
}
