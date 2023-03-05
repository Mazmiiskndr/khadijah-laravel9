<?php

namespace App\Services\Product;

use LaravelEasyRepository\BaseService;

interface ProductService extends BaseService{

    /**
     * Get All Data Product
     *
     * @return void
     */
    public function getAllData();

    /**
     * Get Paginated Data Product
     *
     * @param  int  $perPage
     * @param  string  $search
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginatedData($perPage, $search);
}
