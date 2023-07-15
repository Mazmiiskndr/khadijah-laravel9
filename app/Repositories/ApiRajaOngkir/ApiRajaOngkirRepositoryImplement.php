<?php

namespace App\Repositories\ApiRajaOngkir;

use LaravelEasyRepository\Implementations\Eloquent;
// use App\Models\ApiRajaOngkir;

class ApiRajaOngkirRepositoryImplement extends Eloquent implements ApiRajaOngkirRepository
{

    // /**
    // * Model class to be used in this repository for the common methods inside Eloquent
    // * Don't remove or change $this->model variable name
    // * @property Model|mixed $model;
    // */
    // protected $model;

    // public function __construct(ApiRajaOngkir $model)
    // {
    //     $this->model = $model;
    // }

    /**
     * Retrieve provinces data from RajaOngkir API.
     * @return mixed
     */
    public function getProvinces()
    {
        $url = "http://pro.rajaongkir.com/api/province";
        return $this->executeCurl($url);
    }

    /**
     * Retrieve cities data from RajaOngkir API.
     * @param mixed $provinceId
     * @return mixed
     */
    public function getCities($provinceId)
    {
        $url = "http://pro.rajaongkir.com/api/city?province=" . $provinceId;
        return $this->executeCurl($url);
    }

    /**
     * Retrieve subDistricts data from RajaOngkir API.
     * @return mixed
     */
    public function getSubDistricts()
    {
        $url = "http://pro.rajaongkir.com/api/subdistrict";
        return $this->executeCurl($url);
    }

    /**
     * Retrieve provinceById and cityId data from RajaOngkir API.
     * @param mixed $provinceId
     * @param mixed $cityId
     * @return mixed
     */
    public function getProvinceById($provinceId, $cityId)
    {
        $url = "http://pro.rajaongkir.com/api/city?province=" . $provinceId . "&id=" . $cityId;
        return $this->executeCurl($url);
    }

    /**
     * Retrieve city data from RajaOngkir API by cityId.
     * @param mixed $cityId
     * @return mixed
     */
    public function getCityById($cityId)
    {
        $url = "http://pro.rajaongkir.com/api/city?id=" . $cityId;
        return $this->executeCurl($url);
    }

    /**
     * Retrieve city data from RajaOngkir API by subDistrictId.
     * @param mixed $subDistrictId
     * @return mixed
     */
    public function getSubDistrictById($subDistrictId)
    {
        $url = "http://pro.rajaongkir.com/api/subdistrict?id=" . $subDistrictId;
        return $this->executeCurl($url);
    }

    /**
     * Retrieve city data from RajaOngkir API by cityId.
     * @param mixed $cityId
     * @return mixed
     */
    public function getSubDistrictByCity($cityId)
    {
        $url = "http://pro.rajaongkir.com/api/subdistrict?city=" . $cityId;
        return $this->executeCurl($url);
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
        $url = "http://pro.rajaongkir.com/api/cost";
        $postData = [
            "origin" => $origin,
            "originType" => 'city',
            "destination" => $destination,
            "destinationType" => 'subdistrict',
            "weight" => $weight,
            "courier" => $courier,
        ];
        // origin=501&originType=city&destination=574&destinationType=subdistrict&weight=1700&courier=jne",
        return $this->executeCurl($url, "POST", $postData);
    }

    /**
     * Retrieve Way Bill data from RajaOngkir API.
     * @param string $noResi
     * @param string $courier
     * @return mixed
     */
    public function getWayBill($noResi, $courier)
    {
        $url = "http://pro.rajaongkir.com/api/waybill";
        $postData = [
            "waybill" => $noResi,
            "courier" => $courier
        ];
        return $this->executeCurl($url, "POST", $postData);
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
        // Check if contact data is not empty
        if ($contactData && isset($contactData->city_id)) {
            // Retrieve 'city_id' from contact data
            $origin = $contactData->city_id;
            $destination = $city_id;

            // Check if 'origin' and 'destination' are not empty
            if ($origin && $destination) {

                $costs = $this->getCost($origin, $destination, $weight, $courier);
                // If both 'origin' and 'destination' are set, retrieve the shipping cost
                return $costs[0]['costs'];
            } else {
                // If either 'origin' or 'destination' is empty, throw an exception
                throw new \Exception("Both 'origin' and 'destination' must be set to get shipping cost.");
            }
        } else {
            // If contact data is empty, throw an exception
            throw new \Exception("Contact data must be provided to get shipping cost.");
        }
    }

    /**
     * Execute a cURL request to the RajaOngkir API.
     * @param string $url
     * @return mixed
     * @throws Exception
     */
    private function executeCurl($url, $method = "GET", $postData = null)
    {
        try {
            // Initialize a new cURL session/resource
            $curl = curl_init();

            // If postData is provided, format it as a string
            $postFields = "";
            if ($postData) {
                $postFields = http_build_query($postData);
            }

            // Set various options for a cURL transfer via an associative array
            curl_setopt_array(
                $curl,
                [
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => $method,
                    CURLOPT_POSTFIELDS => $postFields,
                    CURLOPT_HTTPHEADER => [
                        "content-type: application/x-www-form-urlencoded",
                        "key: " . env('API_KEY_RAJA_ONGKIR'),
                    ],
                ]
            );

            // Execute the given cURL session
            $response = curl_exec($curl);
            // Get the HTTP status code of the last cURL operation
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            // Check for errors
            if (curl_errno($curl)) {
                throw new \Exception('cURL Error: ' . curl_error($curl));
            }

            // Check HTTP status code
            if ($httpCode >= 200 && $httpCode < 300) {
                // Decode the response and store it in a variable
                $responseDecoded = json_decode($response, true);

                // If there's no error, return the response
                return isset($responseDecoded['rajaongkir']['results']) ? $responseDecoded['rajaongkir']['results'] : $responseDecoded['rajaongkir'];
            } else {
                if($httpCode >= 400 && $httpCode < 500){
                    return $httpCode;
                }
                throw new \Exception("HTTP request failed with status code " . $httpCode);
            }
        } catch (\Exception $e) {
            // Return the exception message if an exception is thrown
            return "Error: " . $e->getMessage();
        }
    }

    /**
     * Retrieve the list of couriers.
     * This function returns an array of couriers used in the RajaOngkir API.
     * @return array The list of couriers.
     */
    public function getCouriers()
    {
        return [
            "pos"      => "POS Indonesia",
            "jne"      => "JNE",
            "jnt"      => "J&T Express",
            "tiki"     => "TIKI",
            "lion"     => "Lion Parcel",
            "ninja"    => "Ninja Xpress",
            "sicepat"  => "SiCepat Express",
            "anteraja" => "AnterAja",
            // TODO:
            // "ide"      => "ID Express",
            // "sap"      => "SAP Express",
            // "ncs"      => "Nusantara Card Semesta",
            // "rex"      => "Royal Express Indonesia",
            // "jtl"      => "JTL Express",
            // "rpx"      => "RPX Holding",
            // "wahana"   => "Wahana Prestasi Logistik",
            // "pahala"   => "Pahala Kencana Express",
            // "slis"     => "Solusi Ekspres",
            // "expedito" => "Expedito",
            // "ray"      => "Ray Speed",
            // "dse"      => "21 Express",
            // "first"    => "First Logistics",
            // "star"     => "Star Cargo",
            // "idl"      => "IDL Cargo"
        ];
    }


}
