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

    /**
     * Retrieve provinceById and cityId data from RajaOngkir API.
     * @param mixed $provinceId
     * @param mixed $cityId
     * @return mixed
     */
    public function getProvinceById($provinceId, $cityId)
    {
        try {
            return $this->mainRepository->getProvinceById($provinceId, $cityId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve city data from RajaOngkir API by cityId.
     * @param mixed $cityId
     * @return mixed
     */
    public function getCityById($cityId)
    {
        try {
            return $this->mainRepository->getCityById($cityId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve shipping cost data from RajaOngkir API.
     * @param string $origin
     * @param string $destination
     * @param string $weight
     * @param string $courier
     * @return mixed
     */
    public function getCost($origin, $destination, $weight, $courier)
    {
        try {
            return $this->mainRepository->getCost($origin, $destination, $weight, $courier);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve Way Bill data from RajaOngkir API.
     * @param string $noResi
     * @param string $courier
     * @return mixed
     */
    public function getWayBill($noResi, $courier)
    {
        try {
            return $this->mainRepository->getWayBill($noResi, $courier);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve shipping cost for a parcel from RajaOngkir API.
     * @param object $contactData
     * @param string $city_id
     * @param int $weight
     * @param string $courier
     * @return mixed
     * @throws Exception
     */
    public function getCostParcel($contactData, $city_id, $weight, $courier)
    {
        try {
            return $this->mainRepository->getCostParcel($contactData, $city_id, $weight, $courier);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve city data from RajaOngkir API by cityId.
     * @param mixed $cityId
     * @return mixed
     */
    public function getSubDistrictByCity($cityId)
    {
        try {
            return $this->mainRepository->getSubDistrictByCity($cityId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve city data from RajaOngkir API by subDistrictId.
     * @param mixed $subDistrictId
     * @return mixed
     */
    public function getSubDistrictById($subDistrictId)
    {
        try {
            return $this->mainRepository->getSubDistrictById($subDistrictId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve subDistricts data from RajaOngkir API.
     * @return mixed
     */
    public function subDistricts()
    {
        try {
            return $this->mainRepository->subDistricts();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Retrieve the list of couriers.
     * This function returns an array of couriers used in the RajaOngkir API.
     * @return array The list of couriers.
     */
    public function getCouriers()
    {
        try {
            return $this->mainRepository->getCouriers();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

}
