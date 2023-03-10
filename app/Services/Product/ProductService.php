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
     * Get Product By ID
     *
     * @return void
     */
    public function getProductById($id);

    /**
     * getPaginatedData
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @return void
     */
    public function getPaginatedData($perPage, $search, $showing, $categoryFilters);

    /**
     * getGalleryProduct
     *
     * @param  mixed $perPage
     */
    public function getGalleryProduct($perPage, $search);

    /**
     * getLimitData
     *
     * @param  mixed $limit
     * @return void
     */
    public function getLimitData($limit);
}
