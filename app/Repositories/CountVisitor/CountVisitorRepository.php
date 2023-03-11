<?php

namespace App\Repositories\CountVisitor;

use LaravelEasyRepository\Repository;

interface CountVisitorRepository extends Repository{

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
