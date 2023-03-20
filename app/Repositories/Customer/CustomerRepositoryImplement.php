<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Customer;

class CustomerRepositoryImplement extends Eloquent implements CustomerRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Customer $model)
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
        return $this->model->latest('registration_date')->get();
    }


    /**
     * findByUid
     */
    public function findByUid($uid)
    {
        return $this->model->with('province','city','district')->where('customer_uid', $uid)->first();
    }
}
