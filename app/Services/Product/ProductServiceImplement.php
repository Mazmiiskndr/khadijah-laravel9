<?php

namespace App\Services\Product;

use LaravelEasyRepository\Service;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\Log;

class ProductServiceImplement extends Service implements ProductService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(ProductRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData()
    {
        try {
            return $this->mainRepository->getAllData();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
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
    public function getPaginatedData($perPage, $search,$showing,$categoryFilters = [])
    {
        try {
            return $this->mainRepository->getPaginatedData($perPage, $search,$showing,$categoryFilters);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
        }
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
    public function getProductFrontend($perPage, $search,$showing,$categoryFilters = [],$sizes = [])
    {
        try {
            return $this->mainRepository->getProductFrontend($perPage, $search,$showing,$categoryFilters,$sizes);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
        }
    }

    public function getGalleryProduct($perPage, $search)
    {
        try {
            return $this->mainRepository->getGalleryProduct($perPage, $search);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
        }
    }

    /**
     * getProductById
     *
     * @param  mixed $id
     * @return void
     */
    public function getProductById($id)
    {
        try {
            return $this->mainRepository->findById($id);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return null;
        }
    }


    /**
     * getProductByUid
     *
     * @param  mixed $uid
     * @return void
     */
    public function getProductByUid($uid)
    {
        try {
            return $this->mainRepository->getProductByUid($uid);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return null;
        }
    }

    /**
     * getProductBySlug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getProductBySlug($slug)
    {
        try {
            return $this->mainRepository->getProductBySlug($slug);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return null;
        }
    }

    /**
     * getLimitData
     *
     * @param  mixed $limit
     * @return void
     */
    public function getLimitData($limit)
    {
        try {
            return $this->mainRepository->getLimitData($limit);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }


    /**
     * updateProduct
     * @param  mixed $product_id
     * @param  mixed $data
     */
    public function updateProduct($product_id,$data)
    {
        try {
            return $this->mainRepository->updateProduct($product_id, $data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }

    /**
     * createProduct
     * @param  mixed $data
     */
    public function createProduct($data)
    {
        try {
            return $this->mainRepository->createProduct( $data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }

    /**
     * deleteProduct
     * @param  mixed $product_id
     * @param  mixed $data
     */
    public function deleteProduct($product_id, $data)
    {
        try {
            return $this->mainRepository->deleteProduct($product_id, $data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }

}
