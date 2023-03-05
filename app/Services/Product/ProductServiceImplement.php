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
     * @return void
     */
    public function getPaginatedData($perPage, $search,$showing)
    {
        try {
            return $this->mainRepository->getPaginatedData($perPage, $search,$showing);
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

}
