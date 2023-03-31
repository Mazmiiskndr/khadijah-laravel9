<?php

namespace App\Services\Cart;

use LaravelEasyRepository\Service;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Facades\Log;

class CartServiceImplement extends Service implements CartService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(CartRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * getAllDataByCustomer
     * @param  mixed $customer_id
     */
    public function getAllDataByCustomer($customer_id)
    {
        try {
            return $this->mainRepository->getAllDataByCustomer($customer_id);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }

    public function addProductToCart($uid, $customerId)
    {
        try {
            return $this->mainRepository->addProductToCart($uid, $customerId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }
}
