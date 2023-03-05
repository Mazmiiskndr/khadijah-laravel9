<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData();

    /**
     * getPaginatedData
     *
     * @param  int  $perPage
     * @param  string  $search
     * @param  string  $showing
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginatedData($perPage, $search,$showing);
}
