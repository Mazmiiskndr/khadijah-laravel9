<?php

namespace App\Services\Customer;

use LaravelEasyRepository\Service;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Support\Facades\Log;

class CustomerServiceImplement extends Service implements CustomerService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(CustomerRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData()
    {
        try {
            return $this->mainRepository->getAllData();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }


    /**
     * findByUid
     * @param  mixed $uid
     */
    public function findByUid($uid)
    {
        try {
            return $this->mainRepository->findByUid($uid);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * createCustomer
     * @param  mixed $data
     */
    public function createCustomer($data)
    {
        try {
            return $this->mainRepository->createCustomer($data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }


    /**
     * updateCustomer
     * @param  mixed $customer_id
     * @param  mixed $data
     */
    public function updateCustomer($customer_id,$data)
    {
        try {
            return $this->mainRepository->updateCustomer($customer_id, $data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * updateCustomerAddress
     * @param  mixed $customer_id
     * @param  mixed $data
     */
    public function updateCustomerAddress($customer_id,$data)
    {
        try {
            return $this->mainRepository->updateCustomerAddress($customer_id, $data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }
}
