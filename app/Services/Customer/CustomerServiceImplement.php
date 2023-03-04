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
}
