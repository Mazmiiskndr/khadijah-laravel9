<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
        ->leftJoin('detail_products', 'detail_products.product_id', '=', 'product.product_id')
        ->where(function ($query) use ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%');
        })
            ->select(
                'product.*',
                DB::raw('MIN(detail_products.price) as min_price'),
                DB::raw('MAX(detail_products.price) as max_price'),
                DB::raw('MAX(detail_products.discount) as max_discount'),
                DB::raw('MIN(detail_products.discount) as min_discount')
            )
            ->groupBy('product.product_id');

        if (!empty($categoryFilters)) {
            $query->whereIn('category.category_id', $categoryFilters);
        }

        switch ($showing) {
            case 'featured':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'lowest_price':
                $query->orderBy('min_price', 'ASC');
                break;
            case 'highest_price':
                $query->orderBy('max_price', 'DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        $query = $query->with(['detailProducts', 'category', 'images'])->paginate($perPage);

        return $query;
    }

    /**
     * getGalleryProduct
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @return void
     */
    public function getGalleryProduct($perPage, $search)
    {
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
        ->where(function ($query) use ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%');
        });
        $query->orderBy('created_at', 'DESC');

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
