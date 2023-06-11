<?php

namespace App\Repositories\ApiRajaOngkir;

use LaravelEasyRepository\Repository;

interface ApiRajaOngkirRepository extends Repository{

    /**
     * Retrieve provinces data from RajaOngkir API.
     * @return mixed
     */
    public function getProvinces();

    /**
     * Retrieve cities data from RajaOngkir API.
     * @param  mixed $provinceId
     * @return mixed
     */
    public function getCities($provinceId);
}
