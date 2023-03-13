<?php

namespace App\Repositories\ReportProduct;

use LaravelEasyRepository\Repository;

interface ReportProductRepository extends Repository{

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData();
}
