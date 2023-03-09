<?php

namespace App\Services\Promo;

use LaravelEasyRepository\Service;
use App\Repositories\Promo\PromoRepository;
use Illuminate\Support\Facades\Log;

class PromoServiceImplement extends Service implements PromoService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(PromoRepository $mainRepository)
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
