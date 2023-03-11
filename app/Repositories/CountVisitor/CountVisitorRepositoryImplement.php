<?php

namespace App\Repositories\CountVisitor;

use App\Models\Visitor;
use LaravelEasyRepository\Implementations\Eloquent;

class CountVisitorRepositoryImplement extends Eloquent implements CountVisitorRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Visitor $model)
    {
        $this->model = $model;
    }

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData()
    {
        return $this->model->latest()->get();
    }

    /**
     * getLimitData
     *
     * @param  mixed $limit
     * @return void
     */
    public function getLimitData($limit)
    {
        return $this->model->orderBy('created_at', 'DESC')->limit($limit)->get();
    }

}
