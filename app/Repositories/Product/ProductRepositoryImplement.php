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
                $query->orderByRaw('price - IFNULL(discount, 0) ASC');
                break;
            case 'highest_price':
                $query->orderByRaw('price - IFNULL(discount, 0) DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        $query = $query->select('product.*')->paginate($perPage);

        return $query;
    }

    /**
     * getProductFrontend
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @param  mixed $sizes
     * @return void
     */
    public function getProductFrontend($perPage, $search, $showing, $categoryFilters,$sizes)
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
        if (!empty($sizes)) {
            $query->whereIn('size', $sizes);
        }

        switch ($showing) {
            case 'featured':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'lowest_price':
                $query->orderByRaw('price - IFNULL(discount, 0) ASC');
                break;
            case 'highest_price':
                $query->orderByRaw('price - IFNULL(discount, 0) DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        $query = $query->select('product.*')->paginate($perPage);

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


    /**
     * findById
     *
     * @param  mixed $id
     * @return void
     */
    public function findById($id)
    {
        return $this->model->with('images','category','tags')->findOrFail($id);
    }


    /**
     * getProductByUid
     *
     * @param  mixed $uid
     * @return void
     */
    public function getProductByUid($uid)
    {
        return $this->model->with('images', 'category', 'tags')->where('product_uid', $uid)->first();
    }

    /**
     * getProductBySlug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getProductBySlug($slug)
    {
        return $this->model->with('images', 'category', 'tags')->where('product_slug', $slug)->first();
    }

    /**
     * getLimitData
     *
     * @param  mixed $limit
     */
    public function getLimitData($limit)
    {
        return $this->model->with('images')->orderBy('created_at', 'DESC')->limit($limit)->get();
    }

}
