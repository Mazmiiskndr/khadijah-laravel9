<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Repository;

interface CategoryRepository extends Repository{

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData();
}
