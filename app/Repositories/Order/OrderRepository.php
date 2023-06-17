<?php

namespace App\Repositories\Order;

use LaravelEasyRepository\Repository;

interface OrderRepository extends Repository{

    /**
     * This method retrieves an order along with its associated order details, products, and shipping details
     * using the unique order identifier.
     * @param string $orderUid The unique identifier of the order to be retrieved.
     * @return Order|null Returns the Order object if found; otherwise, null.
     */
    public function getOrderWithUid($orderUid);

    /**
     * This method retrieves the total count of orders made by a given customer.
     * @param int $customerId The ID of the customer.
     * @return int Returns the total count of all orders associated with the provided customer ID.
     */
    public function countTotalOrdersByCustomerId($customerId);

    /**
     * This method retrieves the total count of pending orders made by a given customer.
     * @param int $customerId The ID of the customer.
     * @return int Returns the total count of all pending orders associated with the provided customer ID.
     */
    public function countPendingOrdersByCustomerId($customerId);
}
