<?php

namespace App\Repositories\Order;

use App\Enums\OrderStatus;
use App\Http\Livewire\Frontend\Checkout\OrderDetail;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Order;
use App\Models\OrderDetail as ModelsOrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderRepositoryImplement extends Eloquent implements OrderRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;
    protected $orderDetailModel;

    public function __construct(Order $model, ModelsOrderDetail $orderDetailModel)
    {
        $this->model = $model;
        $this->orderDetailModel = $orderDetailModel;
    }

    /**
     * This method retrieves an order along with its associated order details, products, and shipping details
     * using the unique order identifier.
     * @return Order|null Returns the Order object if found; otherwise, null.
     */
    public function getAllOrder()
    {
        return $this->model->with(['customer' => function ($query) {
            $query->select('id', 'name');
        }])
            ->select('order_id', 'order_uid', 'order_number', 'order_status', 'customer_id') // customer_id added
            ->latest()->get();
    }

    /**
     * This method retrieves all products along with their associated order details and the total number of sales.
     * @return \Illuminate\Database\Eloquent\Collection Returns a collection of Product models. Each Product model has two additional attributes:
     * - sales: The total number of sales for the product.
     * - orderDetails: A collection of OrderDetail models associated with the product.
     */
    public function getProductSales()
    {
        return $this->orderDetailModel
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->with('product')
            ->join('order', 'order_detail.order_id', '=', 'order.order_id')
            ->where('order.order_status', OrderStatus::ORDER_COMPLETED)
            ->groupBy('product_id')
            ->get();
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
     * This method retrieves the total count of completed orders made by a given customer.
     * @return int Returns the total count of all completed orders associated with the provided customer ID.
     */
    public function countCompletedOrders()
    {
        return $this->model->where('order_status', OrderStatus::ORDER_COMPLETED)->count();
    }

    /**
     * This method calculates the total price of all completed orders.
     * It sums up the 'total_price' field of all orders where the order status is 'completed'.
     * @return float Returns the total price of all completed orders.
     */
    public function countTotalPrice()
    {
        return $this->model->where('order_status', OrderStatus::ORDER_COMPLETED)->sum('total_price');
    }

    /**
     * This method calculates the total income of all completed orders.
     * It sums up the 'total_price' field of all orders where the order status is 'completed'.
     * @return float Returns the total price of all completed orders to count income.
     */
    public function countTotalIncome()
    {
        // Dapatkan tanggal awal dan akhir bulan ini
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Query for getting all prices for the orders sold this month
        return Order::where('order_status', OrderStatus::ORDER_COMPLETED)
        ->whereBetween('order_date', [$startDate, $endDate])->orderBy('created_at', 'asc')
            ->pluck('total_price');
    }

    /**
     * This method calculates the total number of product units sold for completed orders.
     * @return int Returns the total number of product units sold in completed orders.
     */
    public function countSoldProductUnits()
    {
        return DB::table('order_detail')
        ->join('order', 'order_detail.order_id', '=', 'order.order_id')
        ->where('order.order_status', OrderStatus::ORDER_COMPLETED)
        ->count();
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
            OrderStatus::ORDER_RECEIVED => 'success',
            OrderStatus::ORDER_COMPLETED => 'success',
            OrderStatus::ORDER_CANCELED => 'danger',
            OrderStatus::REFUND => 'danger',
        ];

        // Return the color associated with the status, or 'secondary' if the status is not in the mapping
        return $colors[$status] ?? 'secondary';
    }
}
