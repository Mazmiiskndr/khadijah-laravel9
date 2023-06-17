<?php

namespace App\Repositories\Order;

use App\Enums\OrderStatus;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Order;

class OrderRepositoryImplement extends Eloquent implements OrderRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * This method retrieves an order along with its associated order details, products, and shipping details
     * using the unique order identifier.
     * @param string $orderUid The unique identifier of the order to be retrieved.
     * @return Order|null Returns the Order object if found; otherwise, null.
     */
    public function getOrderWithUid($orderUid)
    {
        return $this->model->with('orderDetails.product', 'shippingDetail')->where('order_uid', $orderUid)->first();
    }

    /**
     * This method retrieves the total count of orders made by a given customer.
     * @param int $customerId The ID of the customer.
     * @return int Returns the total count of all orders associated with the provided customer ID.
     */
    public function countTotalOrdersByCustomerId($customerId)
    {
        return $this->model->where('customer_id', $customerId)->count();
    }

    /**
     * This method retrieves the total count of pending orders made by a given customer.
     * @param int $customerId The ID of the customer.
     * @return int Returns the total count of all pending orders associated with the provided customer ID.
     */
    public function countPendingOrdersByCustomerId($customerId)
    {
        return $this->model->where('customer_id', $customerId)->where('order_status', OrderStatus::PENDING_PAYMENT)->count();
    }

    /**
     * This method retrieves all order details for a given customer.
     * @param int $customerId The ID of the customer.
     * @return Collection Returns a collection of all orders associated with the provided customer ID.
     */
    public function getOrderDetailsByCustomerId($customerId)
    {
        return $this->model->with('orderDetails.product', 'shippingDetail')->where('customer_id', $customerId)->get();
    }

    /**
     * Function to get the color associated with the order status. This is used for displaying the status in the front end.
     * @param string $status The status of the order
     * @return string The color associated with the status
     */
    public function getColors($status)
    {
        // Mapping of order statuses to their associated colors
        $colors = [
            OrderStatus::PENDING_PAYMENT => 'warning',
            OrderStatus::PAYMENT_VERIFICATION => 'primary',
            OrderStatus::ORDER_PROCESSING => 'primary',
            OrderStatus::ORDER_SENT => 'info',
            OrderStatus::ORDER_RECEIVED => 'info',
            OrderStatus::PAYMENT_SUCCESS => 'success',
            OrderStatus::ORDER_CANCELED => 'danger',
            OrderStatus::REFUND => 'danger',
        ];

        // Return the color associated with the status, or 'secondary' if the status is not in the mapping
        return $colors[$status] ?? 'secondary';
    }

}
