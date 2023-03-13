<?php

namespace App\Services\ReportProduct;

use LaravelEasyRepository\Service;
use App\Repositories\ReportProduct\ReportProductRepository;
use Illuminate\Support\Facades\Log;

class ReportProductServiceImplement extends Service implements ReportProductService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(ReportProductRepository $mainRepository)
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
}
