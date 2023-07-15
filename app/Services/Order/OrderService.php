<?php

namespace App\Services\Order;

use LaravelEasyRepository\BaseService;

interface OrderService extends BaseService{

    /**
     * This method retrieves an order along with its associated order details, products, and shipping details
     * using the unique order identifier.
     * @return Order|null Returns the Order object if found; otherwise, null.
     */
    public function getAllOrder();

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

    /**
     * This method retrieves the total count of completed orders made by a given customer.
     * @return int Returns the total count of all completed orders associated with the provided customer ID.
     */
    public function countCompletedOrders();

    /**
     * This method retrieves all products along with their associated order details and the total number of sales.
     * @return \Illuminate\Database\Eloquent\Collection Returns a collection of Product models. Each Product model has two additional attributes:
     * - sales: The total number of sales for the product.
     * - orderDetails: A collection of OrderDetail models associated with the product.
     */
    public function getProductSales();

    /**
     * This method calculates the total price of all completed orders.
     * It sums up the 'total_price' field of all orders where the order status is 'completed'.
     * @return float Returns the total price of all completed orders.
     */
    public function countTotalPrice();

    /**
     * This method calculates the total income of all completed orders.
     * It sums up the 'total_price' field of all orders where the order status is 'completed'.
     * @return float Returns the total price of all completed orders to count income.
     */
    public function countTotalIncome();

    /**
     * This method calculates the total number of product units sold for completed orders.
     * It joins the 'order_detail' and 'order' tables based on 'order_id'.
     * @return int Returns the total number of product units sold in completed orders.
     */
    public function countSoldProductUnits();

    /**
     * This method retrieves all order details for a given customer.
     * @param int $customerId The ID of the customer.
     * @return Collection Returns a collection of all orders associated with the provided customer ID.
     */
    public function getOrderDetailsByCustomerId($customerId);

    /**
     * Function to get the color associated with the order status. This is used for displaying the status in the front end.
     * @param string $status The status of the order
     * @return string The color associated with the status
     */
    public function getColors($status);

}
