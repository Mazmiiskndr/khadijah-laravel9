<?php

namespace App\Repositories\Tag;

use LaravelEasyRepository\Repository;

interface TagRepository extends Repository{

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData();

    /**
     * getLimitData
     *
     * @param  mixed $limit
     * @return void
     */
    public function getLimitData($limit);
}
