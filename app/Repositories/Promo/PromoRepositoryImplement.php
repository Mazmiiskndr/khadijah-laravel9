<?php

namespace App\Repositories\Promo;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Promo;

class PromoRepositoryImplement extends Eloquent implements PromoRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Promo $model)
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
}
