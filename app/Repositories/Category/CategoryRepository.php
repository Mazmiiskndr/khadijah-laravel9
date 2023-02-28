<?php

namespace App\Repositories\Category;

use LaravelEasyRepository\Repository;

interface CategoryRepository extends Repository{

    public function getAllData();
}
