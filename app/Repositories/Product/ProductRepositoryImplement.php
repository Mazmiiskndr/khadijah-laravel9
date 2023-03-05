<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;

class ProductRepositoryImplement extends Eloquent implements ProductRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Product $model)
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
     * getPaginatedData
     *
     * @param  int  $perPage
     * @param  string  $search
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginatedData($perPage, $search)
    {
        return $this->model->where('product_name', 'LIKE', '%' . $search . '%')
            // ->orWhere('product_description', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

}
