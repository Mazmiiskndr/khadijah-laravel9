<?php

namespace App\Services\Category;

use LaravelEasyRepository\BaseService;

interface CategoryService extends BaseService{

    /**
     * Create New Category
     *
     * @param  mixed $data
     * @return void
     */
    public function store(array $data);

    /**
     * Get All Data Categories
     *
     * @return void
     */
    public function getAllData();

}
