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
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @return void
     */
    public function getPaginatedData($perPage, $search, $showing, $categoryFilters)
    {
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
        ->where(function ($query) use ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%');
        });

        if (!empty($categoryFilters)) {
            $query->whereHas('category', function ($query) use ($categoryFilters) {
                $query->whereIn('category_id', $categoryFilters);
            });
        }

        switch ($showing) {
            case 'featured':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'lowest_price':
                $query->orderBy('price', 'ASC');
                break;
            case 'highest_price':
                $query->orderBy('price', 'DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        $query = $query->select('product.*')->paginate($perPage);

        return $query;
    }


    public function findById($id)
    {
        return $this->model->with('images','category','tags')->findOrFail($id);
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
