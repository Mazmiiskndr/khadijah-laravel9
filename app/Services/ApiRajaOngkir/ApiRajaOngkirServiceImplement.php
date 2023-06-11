<?php

namespace App\Services\ApiRajaOngkir;

use LaravelEasyRepository\Service;
use App\Repositories\ApiRajaOngkir\ApiRajaOngkirRepository;
use Illuminate\Support\Facades\Log;

class ApiRajaOngkirServiceImplement extends Service implements ApiRajaOngkirService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(ApiRajaOngkirRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * Retrieve provinces data from RajaOngkir API.
     * @return mixed
     */
    public function getProvinces()
    {
        try {
            return $this->mainRepository->getProvinces();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve cities data from RajaOngkir API.
     * @param  mixed $provinceId
     * @return mixed
     */
    public function getCities($provinceId)
    {
        try {
            return $this->mainRepository->getCities($provinceId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }
}
