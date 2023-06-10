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
     * Get a product by UID from the repository.
     *
     * @param int $uid
     * @return mixed
     */
    public function getProductByUid($uid);

    /**
     * Get a product by Slug from the repository.
     *
     * @param int $slug
     * @return mixed
     */
    public function getProductBySlug($slug);

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
     * getProductFrontend
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @param  mixed $sizes
     * @return void
     */
    public function getProductFrontend($perPage, $search,$showing,$categoryFilters,$sizes);


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


    /**
     * updateProduct
     *
     * @param  mixed $product_id
     * @param  mixed $data
     */
    public function updateProduct($product_id,$data);

    /**
     * createProduct
     * @param  mixed $data
     */
    public function createProduct($data);

    /**
     * deleteProduct
     *
     * @param  mixed $product_id
     */
    public function deleteProduct($product_id);

}
