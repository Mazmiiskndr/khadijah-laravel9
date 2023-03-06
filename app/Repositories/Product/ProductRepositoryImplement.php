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
    public function getPaginatedData($perPage, $search,$showing)
    {
        $query =  $this->model->join('category', 'category.category_id', '=', 'product.category_id')
        ->where('product_name', 'LIKE', '%' . $search . '%')
        ->orWhere('category_name', 'LIKE', '%' . $search . '%')
        ->orderBy('created_at', 'desc');

        switch ($showing) {
            case 'featured':
                // implement code for featured products
                break;
            case 'lowest_price':
                $query->orderBy('price', 'asc');
                break;
            case 'highest_price':
                $query->orderBy('price', 'desc');
                break;
            default:
                break;
        }

        $query = $query->select('product.*')->paginate($perPage);

        return $query;
    }

    public function findById($id)
    {
        return $this->model->with('images','category','tags')->findOrFail($id);
    }


}
