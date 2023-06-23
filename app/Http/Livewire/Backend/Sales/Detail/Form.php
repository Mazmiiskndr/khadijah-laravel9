<?php

namespace App\Http\Livewire\Backend\Sales\Detail;

use App\Enums\OrderStatus;
use App\Services\Order\OrderService;
use Livewire\Component;
use ReflectionClass;

class Form extends Component
{
    // Define public properties
    public $orderStatuses, $order_uid, $orders, $shippingDetail, $colors;

    protected $listeners = [
        'paymentUpdated' => 'handlePaymentUpdated',
    ];

    /**
     * The function to be executed when the component is being created.
     * @param  App\Services\OrderService  $orderService
     * @return void
     */
    public function mount(OrderService $orderService)
    {
        $this->fetchOrderStatuses();
        $this->fetchOrderDetails($orderService);
        $this->fetchShippingDetails();

        // get color for order status
        $this->colors = $orderService->getColors($this->orders->order_status);
    }

    /**
     * Render the component form `detail.form`.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.backend.sales.detail.form');
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
        $this->orders = $orderService->getOrderWithUid($this->order_uid);
    }

    /**
     * Fetching the Shipping details.
     * @return void
     */
    private function fetchShippingDetails()
    {
        $this->shippingDetail = $this->orders->shippingDetail;
    }
}
