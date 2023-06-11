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
}
