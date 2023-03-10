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
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @return void
     */
    public function getPaginatedData($perPage, $search,$showing,$categoryFilters);


    /**
     * getGalleryProduct
     *
     * @param  mixed $perPage
     * @return void
     */
    public function getGalleryProduct($perPage,$search);

    /**
     * getLimitData
     *
     * @param  mixed $limit
     * @return void
     */
    public function getLimitData($limit);
}
