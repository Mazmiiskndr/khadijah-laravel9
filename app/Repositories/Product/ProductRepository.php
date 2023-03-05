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
     * Get a product by ID from the repository.
     *
     * @param int $id
     * @return mixed
     */
    public function findById($id);

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
