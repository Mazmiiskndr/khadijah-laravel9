<?php

namespace App\Services\Promo;

use LaravelEasyRepository\BaseService;

interface PromoService extends BaseService{

    /**
     * Get All Data Categories
     *
     * @return void
     */
    public function getAllData();
}
