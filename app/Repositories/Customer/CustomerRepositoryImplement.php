<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Customer;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CustomerRepositoryImplement extends Eloquent implements CustomerRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;
    protected $apiRajaOngkirService;

    public function __construct(Customer $model, ApiRajaOngkirService $apiRajaOngkirService)
    {
        $this->model = $model;
        $this->apiRajaOngkirService = $apiRajaOngkirService;
    }

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData()
    {
        return $this->model->latest('registration_date')->get();
    }


    /**
     * findByUid
     */
    public function findByUid($uid)
    {
        $customer = $this->model->with('rekening_customers')->where('customer_uid', $uid)->first();

        if ($customer) {
            // Fetch provinceById data from API.
            $customer->provinceAndCity = $this->apiRajaOngkirService->getProvinceById($customer->province_id, $customer->city_id);
            // Add more requests for other endpoints as needed.
        }

        return $customer;
    }

    /**
     * Creates a new customer.
     * @param object $data The data to use when creating the customer.
     * @return Model|false The created customer, or false on failure.
     */
    public function createCustomer($data)
    {
        try {
            // Format the current time as a string.
            $regisDate = Carbon::now()->format('Y-m-d h:i:s');
            $data->registration_date = $regisDate;

            // Create a new customer using the provided data.
            $customer = $this->model->create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'address' => $data->address,
                'city_id' => $data->city_id,
                'province_id' => $data->province_id,
                'postal_code' => $data->postal_code,
                'phone' => $data->phone,
                'registration_date' => $data->registration_date,
            ]);

            return $customer;
        } catch (\Throwable $th) {
            // If something went wrong, return the error message.
            return $th->getMessage();
        }
    }

    /**
     * Updates an existing customer.
     * @param mixed $customer_id The ID of the customer to update.
     * @param object $data The data to use when updating the customer.
     * @return Model|null The updated customer, or null on failure.
     */
    public function updateCustomer($customer_id, $data)
    {
        try {
            // Check if a customer ID is provided.
            if ($customer_id) {
                // Find the customer with the provided ID.
                $customer = $this->model->find($customer_id);
                // Update the customer data.
                $this->updateCustomerData($customer, $data);
                // Return the updated customer.
                return $customer;
            }

            // If no customer ID is provided, return null.
            return null;
        } catch (\Throwable $th) {
            // If something went wrong, return the error message.
            return $th->getMessage();
        }
    }

    /**
     * Updates an existing customer's address.
     * @param mixed $customer_id The ID of the customer whose address to update.
     * @param array $data The data to use when updating the customer's address.
     * @return Model|null The updated customer, or null on failure.
     */
    public function updateCustomerAddress($customer_id, $data)
    {
        try {

            // Check if a customer ID is provided.
            if ($customer_id) {
                // Find the customer with the provided ID.
                $customer = $this->model->find($customer_id);
                // Define the data to update.
                $customerData = [
                    'address' => $data['address'],
                    'city_id' => $data['city_id'],
                    'province_id' => $data['province_id'],
                    'postal_code' => $data['postal_code'],
                ];
                // Update the customer with the defined data.
                $customer->update($customerData);

                // Return the updated customer.
                return $customer;
            }

            // If no customer ID is provided, return null.
            return null;
        } catch (\Throwable $th) {
            // If something went wrong, return the error message.
            return $th->getMessage();
        }
    }

    /**
     * Updates the customer data with the given data.
     * @param Model $customer The customer to update.
     * @param array $data The data to update the customer with.
     * @return void
     */
    private function updateCustomerData($customer, $data)
    {
        // Define the data to update.
        $customerData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'city_id' => $data['city_id'],
            'province_id' => $data['province_id'],
            'postal_code' => $data['postal_code'],
            'phone' => $data['phone'],
        ];

        // If a password is provided, hash it and add it to the data to update.
        if (!empty($data['password'])) {
            $customerData['password'] = Hash::make($data['password']);
        }

        // Update the customer with the defined data.
        $customer->update($customerData);
    }
}
