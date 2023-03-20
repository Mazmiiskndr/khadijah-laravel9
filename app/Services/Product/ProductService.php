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
     * getProductFrontend
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @param  mixed $sizes
     * @return void
     */
    public function getProductFrontend($perPage, $search, $showing, $categoryFilters,$sizes);

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
