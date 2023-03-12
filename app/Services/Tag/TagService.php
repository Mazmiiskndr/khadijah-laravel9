<?php

namespace App\Services\Tag;

use LaravelEasyRepository\BaseService;

interface TagService extends BaseService{

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
