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
            return [];
            //throw $th;
        }
    }

    /**
     * findByUid
     */
    public function findByUid($uid)
    {
        try {
            return $this->mainRepository->findByUid($uid);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }
}
