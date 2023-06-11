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
}
