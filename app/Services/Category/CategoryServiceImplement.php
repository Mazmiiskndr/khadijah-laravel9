<?php

namespace App\Services\Category;

use LaravelEasyRepository\Service;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Facades\Log;

class CategoryServiceImplement extends Service implements CategoryService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(CategoryRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

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
     * Create a new category
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        try {
            return $this->mainRepository->store($data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return false;
        }
    }


}
