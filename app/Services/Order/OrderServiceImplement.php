<?php

namespace App\Services\Order;

use LaravelEasyRepository\Service;
use App\Repositories\Order\OrderRepository;
use Illuminate\Support\Facades\Log;

class OrderServiceImplement extends Service implements OrderService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(OrderRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * This method retrieves an order along with its associated order details, products, and shipping details
     * using the unique order identifier.
     * @return Order|null Returns the Order object if found; otherwise, null.
     */
    public function getAllOrder()
    {
        try {
            return $this->mainRepository->getAllOrder();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * This method retrieves an order along with its associated order details, products, and shipping details
     * using the unique order identifier.
     * @param string $orderUid The unique identifier of the order to be retrieved.
     * @return Order|null Returns the Order object if found; otherwise, null.
     */
    public function getOrderWithUid($orderUid)
    {
        try {
            return $this->mainRepository->getOrderWithUid($orderUid);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * This method retrieves the total count of orders made by a given customer.
     * @param int $customerId The ID of the customer.
     * @return int Returns the total count of all orders associated with the provided customer ID.
     */
    public function countTotalOrdersByCustomerId($customerId)
    {
        try {
            return $this->mainRepository->countTotalOrdersByCustomerId($customerId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * This method retrieves the total count of pending orders made by a given customer.
     * @param int $customerId The ID of the customer.
     * @return int Returns the total count of all pending orders associated with the provided customer ID.
     */
    public function countPendingOrdersByCustomerId($customerId)
    {
        try {
            return $this->mainRepository->countPendingOrdersByCustomerId($customerId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * This method retrieves all order details for a given customer.
     * @param int $customerId The ID of the customer.
     * @return Collection Returns a collection of all orders associated with the provided customer ID.
     */
    public function getOrderDetailsByCustomerId($customerId)
    {
        try {
            return $this->mainRepository->getOrderDetailsByCustomerId($customerId);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * Function to get the color associated with the order status. This is used for displaying the status in the front end.
     * @param string $status The status of the order
     * @return string The color associated with the status
     */
    public function getColors($status)
    {
        try {
            return $this->mainRepository->getColors($status);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }


}
