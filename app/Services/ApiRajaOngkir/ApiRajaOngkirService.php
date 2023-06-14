<?php

namespace App\Services\ApiRajaOngkir;

use LaravelEasyRepository\BaseService;

interface ApiRajaOngkirService extends BaseService{

    /**
     * Retrieve provinces data from RajaOngkir API.
     * @return mixed`
     */
    public function getProvinces();

    /**
     * Retrieve cities data from RajaOngkir API.
     * @param  mixed $provinceId
     * @return mixed
     */
    public function getCities($provinceId);

    /**
     * Retrieve provinceById and cityId data from RajaOngkir API.
     * @param mixed $provinceId
     * @param mixed $cityId
     * @return mixed
     */
    public function getProvinceById($provinceId, $cityId);

    /**
     * Retrieve shipping cost data from RajaOngkir API.
     * @param string $origin
     * @param string $destination
     * @param string $weight
     * @param string $courier
     * @return mixed
     */
    public function getCost($origin, $destination, $weight, $courier);
}
