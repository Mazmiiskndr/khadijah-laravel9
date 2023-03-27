<?php

namespace App\Repositories\Cart;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Cart;

class CartRepositoryImplement extends Eloquent implements CartRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    /**
     * getAllDataByCustomer
     * @param  mixed $customer_id
     */
    public function getAllDataByCustomer($customer_id)
    {
        return $this->model->with('product')->where('customer_id', $customer_id)->get();
    }
}
