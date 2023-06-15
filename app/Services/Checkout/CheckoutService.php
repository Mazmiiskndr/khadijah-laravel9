<?php

namespace App\Services\Checkout;

use LaravelEasyRepository\BaseService;

interface CheckoutService extends BaseService{

    /**
     * Store the order and its details.
     * @param  mixed $data
     * @return void
     */
    public function storeCheckout($data);
}
