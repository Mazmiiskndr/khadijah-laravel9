<?php

namespace App\Services\Category;

use LaravelEasyRepository\BaseService;

interface CategoryService extends BaseService{


    /**
     * Get All Data Categories
     *
     * @return void
     */
    public function getAllData();
}
