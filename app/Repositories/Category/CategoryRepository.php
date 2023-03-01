<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Repository;

interface CategoryRepository extends Repository{

    /**
     * Create New Category
     *
     * @param  mixed $data
     * @return void
     */
    public function store(array $data);
    /**
     * Get All Categories
     *
     * @return void
     */
    public function getAllData();
}
