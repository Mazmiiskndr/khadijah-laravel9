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

    /**
     * Retrieve provinceById and cityId data from RajaOngkir API.
     * @param mixed $provinceId
     * @param mixed $cityId
     * @return mixed
     */
    public function getProvinceById($provinceId, $cityId);

    /**
     * Retrieve city data from RajaOngkir API by cityId.
     * @param mixed $cityId
     * @return mixed
     */
    public function getCityById($cityId);

    /**
     * Retrieve shipping cost data from RajaOngkir API.
     * @param string $origin
     * @param string $destination
     * @param string $weight
     * @param string $courier
     * @return mixed
     */
    public function getCost($origin, $destination, $weight, $courier);

    /**
     * Retrieve Way Bill data from RajaOngkir API.
     * @param string $noResi
     * @param string $courier
     * @return mixed
     */
    public function getWayBill($noResi, $courier);

    /**
     * Retrieve shipping cost for a parcel from RajaOngkir API.
     * @param object $contactData
     * @param string $city_id
     * @param int $weight
     * @param string $courier
     * @return mixed
     * @throws Exception
     */
    public function getCostParcel($contactData, $city_id, $weight, $courier);

    /**
     * Retrieve city data from RajaOngkir API by cityId.
     * @param mixed $cityId
     * @return mixed
     */
    public function getSubDistrictByCity($cityId);

    /**
     * Retrieve city data from RajaOngkir API by subDistrictId.
     * @param mixed $subDistrictId
     * @return mixed
     */
    public function getSubDistrictById($subDistrictId);

    /**
     * Retrieve subDistricts data from RajaOngkir API.
     * @return mixed
     */
    public function subDistricts();
}
