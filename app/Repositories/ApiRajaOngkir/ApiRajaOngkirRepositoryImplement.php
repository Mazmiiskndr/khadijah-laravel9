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
        $url = "http://api.rajaongkir.com/starter/province";
        return $this->executeCurl($url);
    }

    /**
     * Retrieve cities data from RajaOngkir API.
     * @param mixed $provinceId
     * @return mixed
     */
    public function getCities($provinceId)
    {
        $url = "http://api.rajaongkir.com/starter/city?province=" . $provinceId;
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
        $url = "http://api.rajaongkir.com/starter/city?province=" . $provinceId . "&id=" . $cityId;
        return $this->executeCurl($url);
    }

    /**
     * Execute a cURL request to the RajaOngkir API.
     * @param string $url
     * @return mixed
     */
    private function executeCurl($url)
    {
        // Initialize a new cURL session/resource
        $curl = curl_init();

        // Set various options for a cURL transfer via an associative array
        curl_setopt_array($curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: " . env('API_KEY_RAJA_ONGKIR'),
                ),
            )
        );

        // Execute the given cURL session
        $response = curl_exec($curl);
        // Retrieve the error string of the last cURL operation
        $err = curl_error($curl);

        // Close the cURL session and free all resources. The cURL handle, curl, is also deleted
        curl_close($curl);

        // Check if there's an error
        if ($err) {
            // Return the error message if there is one
            return "cURL Error #:" . $err;
        } else {
            // Decode the response and store it in a variable
            $responseDecoded = json_decode($response, true);
            // If there's no error, return the response
            return $responseDecoded['rajaongkir']['results'];
        }
    }


}
