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
        // Initialize a new cURL session/resource
        $curl = curl_init();

        // Set various options for a cURL transfer via an associative array
        curl_setopt_array($curl, array(
            // The URL to fetch. This can also be set when initializing a session with curl_init()
            CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it directly
            CURLOPT_RETURNTRANSFER => true,
            // An empty string ('') means no encoding
            CURLOPT_ENCODING => "",
            // The maximum amount of HTTP redirections to follow. Use this option alongside CURLOPT_FOLLOWLOCATION
            CURLOPT_MAXREDIRS => 10,
            // The maximum number of seconds to allow cURL functions to execute
            CURLOPT_TIMEOUT => 30,
            // Forces cURL to use HTTP version 1.1
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // Specifies the custom request method to be used instead of GET when a HTTP request is made
            CURLOPT_CUSTOMREQUEST => "GET",
            // Sets the HTTP headers to be used in the request
            CURLOPT_HTTPHEADER => array(
                // RajaOngkir API key, retrieved from Laravel's environment variables
                "key: " . env('API_KEY_RAJA_ONGKIR')
            ),
        ));

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
            $provinces = json_decode($response, true);
            // If there's no error, return the response
            return $provinces['rajaongkir']['results'];
        }
    }

    /**
     * Retrieve cities data from RajaOngkir API.
     * @param mixed $provinceId
     * @return mixed
     */
    public function getCities($provinceId)
    {
        // Initialize a new cURL session/resource
        $curl = curl_init();

        // Set various options for a cURL transfer via an associative array
        curl_setopt_array($curl, array(
            // The URL to fetch. This can also be set when initializing a session with curl_init()
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=" . $provinceId,
            // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it directly
            CURLOPT_RETURNTRANSFER => true,
            // An empty string ('') means no encoding
            CURLOPT_ENCODING => "",
            // The maximum amount of HTTP redirections to follow. Use this option alongside CURLOPT_FOLLOWLOCATION
            CURLOPT_MAXREDIRS => 10,
            // The maximum number of seconds to allow cURL functions to execute
            CURLOPT_TIMEOUT => 30,
            // Forces cURL to use HTTP version 1.1
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // Specifies the custom request method to be used instead of GET when a HTTP request is made
            CURLOPT_CUSTOMREQUEST => "GET",
            // Sets the HTTP headers to be used in the request
            CURLOPT_HTTPHEADER => array(
                // RajaOngkir API key, retrieved from Laravel's environment variables
                "key: " . env('API_KEY_RAJA_ONGKIR')
            ),
        ));

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
            $provinces = json_decode($response, true);
            // If there's no error, return the response

            return $provinces['rajaongkir']['results'];
        }
    }

}
