<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CustomerRepositoryImplement extends Eloquent implements CustomerRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
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
        return $this->model->with('province','city','district', 'rekening_customers')->where('customer_uid', $uid)->first();
    }


    /**
     * createCustomer
     * @param  mixed $data
     */
    public function createCustomer($data)
    {
        $regisDate = Carbon::now()->format('Y-m-d h:i:s');
        $data->registration_date = $regisDate;
        try {
            // Create New Customer
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
        } catch(\Throwable $th) {
            // Return the error message
            return $th->getMessage();
        }
    }


    /**
     * updateCustomer
     * @param  mixed $customer_id
     * @param  mixed $data
     */
    public function updateCustomer($customer_id,$data)
    {
        if ($data->customer_id) {
            $customer = $this->model->find($data->customer_id);
            $customerData = [
                'name' => $data->name,
                'email' => $data->email,
                'address' => $data->address,
                'city_id' => $data->city_id,
                'province_id' => $data->province_id,
                'postal_code' => $data->postal_code,
                'phone' => $data->phone,
            ];
            if (!empty($data->password)) {
                $customerData['password'] = Hash::make($data->password);
            }
            $customer->update($customerData);
            // Return updated product
            return $customer;
        }
        return null;
    }
}
