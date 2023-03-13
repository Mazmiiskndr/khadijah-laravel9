<?php

namespace App\Services\ReportProduct;

use LaravelEasyRepository\BaseService;

interface ReportProductService extends BaseService{

    /**
     * Get All Data Product
     *
     * @return void
     */
    public function getAllData();
}
