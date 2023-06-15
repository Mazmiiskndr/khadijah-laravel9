<?php

namespace App\Services\Checkout;

use LaravelEasyRepository\Service;
use App\Repositories\Checkout\CheckoutRepository;
use Illuminate\Support\Facades\Log;

class CheckoutServiceImplement extends Service implements CheckoutService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(CheckoutRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * Store the order and its details.
     * @param  mixed $data
     * @return void
     */
    public function storeCheckout($data)
    {
        try {
            return $this->mainRepository->storeCheckout($data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }
}
