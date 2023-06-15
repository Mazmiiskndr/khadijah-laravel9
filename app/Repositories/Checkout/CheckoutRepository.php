<?php

namespace App\Repositories\Checkout;

use LaravelEasyRepository\Repository;

interface CheckoutRepository extends Repository{

    // Write something awesome :)

    /**
     * Store the order and its details.
     * @param  mixed $data
     * @return void
     */
    public function storeCheckout($data);
}
