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
     * This method retrieves the total count of completed orders made by a given customer.
     * @return int Returns the total count of all completed orders associated with the provided customer ID.
     */
    public function countCompletedOrders()
    {
        try {
            return $this->mainRepository->countCompletedOrders();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * This method calculates the total price of all completed orders.
     * It sums up the 'total_price' field of all orders where the order status is 'completed'.
     * @return float Returns the total price of all completed orders.
     */
    public function countTotalPrice()
    {
        try {
            return $this->mainRepository->countTotalPrice();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * This method calculates the total income of all completed orders.
     * It sums up the 'total_price' field of all orders where the order status is 'completed'.
     * @return float Returns the total price of all completed orders to count income.
     */
    public function countTotalIncome()
    {
        try {
            return $this->mainRepository->countTotalIncome();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            throw $th;
        }
    }

    /**
     * This method calculates the total number of product units sold for completed orders.
     * It joins the 'order_detail' and 'order' tables based on 'order_id'.
     * @return int Returns the total number of product units sold in completed orders.
     */
    public function countSoldProductUnits()
    {
        try {
            return $this->mainRepository->countSoldProductUnits();
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
