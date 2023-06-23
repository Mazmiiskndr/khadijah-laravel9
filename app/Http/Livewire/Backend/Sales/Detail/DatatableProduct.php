<?php

namespace App\Http\Livewire\Backend\Sales\Detail;

use App\Enums\OrderStatus;
use App\Services\Order\OrderService;
use Livewire\Component;
use ReflectionClass;

class DatatableProduct extends Component
{
    // Define public properties
    public $orderStatuses, $order_uid, $orders, $products, $shippingDetail, $colors;

    /**
     * The function to be executed when the component is being created.
     * @param  App\Services\OrderService  $orderService
     * @return void
     */
    public function mount(OrderService $orderService)
    {
        $this->fetchOrderDetails($orderService);
        $this->extractProductsFromOrderDetails();

        // get color for order status
        $this->colors = $orderService->getColors($this->orders->order_status);
    }

    /**
     * Render the component datatable `detail.datatable`.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.backend.sales.detail.datatable-product');
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
     * Extract products from the fetched order details.
     * @return void
     */
    private function extractProductsFromOrderDetails()
    {
        // Initialize an empty array for products
        $this->products = [];

        // Check if there are any order details
        if (isset($this->orders->orderDetails)) {
            // Loop through each order detail
            foreach ($this->orders->orderDetails as $orderDetail) {
                // Check if the order detail has a product
                if (isset($orderDetail->product)) {
                    // Add the product to the products array along with the quantity
                    $this->products[] = ['product' => $orderDetail->product, 'price' => $orderDetail->price, 'quantity' => $orderDetail->quantity];
                }
            }
        }
        // dd($this->products);
    }
}
