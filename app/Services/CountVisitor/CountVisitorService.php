<?php

namespace App\Services\CountVisitor;

use LaravelEasyRepository\BaseService;

interface CountVisitorService extends BaseService{

    /**
     * Get All Data Categories
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
