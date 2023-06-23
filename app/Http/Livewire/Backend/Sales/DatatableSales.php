<?php

namespace App\Http\Livewire\Backend\Sales;

use App\Enums\OrderStatus;
use App\Services\Order\OrderService;
use Livewire\Component;
use ReflectionClass;

class DatatableSales extends Component
{
    // Define public properties
    public $orderStatuses, $orderUid, $orders, $products, $shippingDetail, $colors;

    // protected $listeners = [
    //     'paymentUpdated' => 'handlePaymentUpdated',
    // ];

    /**
     * The function to be executed when the component is being created.
     * @param  App\Services\OrderService  $orderService
     * @return void
     */
    public function mount(OrderService $orderService)
    {
        $this->fetchOrderStatuses();
        $this->fetchOrderDetails($orderService);


        // get color for order status
        $this->colors = [];
        foreach ($this->orders as $order) {
            $this->colors[$order->order_number] = $orderService->getColors($order->order_status);
        }
    }

    /**
     * Renders the order-detail view component.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.backend.sales.datatable-sales');
    }

    /**
     * Fetching the order status values from the OrderStatus enum.
     * @return void
     */
    private function fetchOrderStatuses()
    {
        $this->orderStatuses = (new ReflectionClass(OrderStatus::class))->getConstants();
    }

    /**
     * Fetching the order details by the order UID.
     * @param  App\Services\OrderService  $orderService
     * @return void
     */
    private function fetchOrderDetails(OrderService $orderService)
    {
        $this->orders = $orderService->getAllOrder();
    }
}
