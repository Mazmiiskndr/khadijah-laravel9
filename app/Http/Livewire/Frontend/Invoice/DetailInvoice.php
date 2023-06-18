<?php

namespace App\Http\Livewire\Frontend\Invoice;

use App\Enums\OrderStatus;
use App\Services\Order\OrderService;
use Livewire\Component;
use ReflectionClass;

class DetailInvoice extends Component
{
    // Define public properties
    public $orderStatuses, $orderUid, $orders, $products, $shippingDetail, $colors, $contact, $totalPrice = 0;

    /**
     * The function to be executed when the component is being created.
     * @param  App\Services\OrderService  $orderService
     * @return void
     */
    public function mount(OrderService $orderService)
    {
        $this->fetchOrderStatuses();
        $this->fetchOrderDetails($orderService);
        $this->extractProductsFromOrderDetails();
        $this->fetchShippingDetails();
        $this->contact = app('contactData');
        // get color for order status
        $this->colors = $orderService->getColors($this->orders->order_status);
    }

    /**
     * Renders the detail-invoice view component.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.frontend.invoice.detail-invoice');
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
        $this->orders = $orderService->getOrderWithUid($this->orderUid);
    }

    /**
     * Fetching the Shipping details.
     * @return void
     */
    private function fetchShippingDetails()
    {
        $this->shippingDetail = $this->orders->shippingDetail;
    }

    private function extractProductsFromOrderDetails()
    {
        // Initialize an empty array for products and totalPrice
        $this->products = [];
        $this->totalPrice = 0;

        // Check if there are any order details
        if (isset($this->orders->orderDetails)) {
            // Loop through each order detail
            foreach ($this->orders->orderDetails as $orderDetail) {
                // Check if the order detail has a product
                if (isset($orderDetail->product)) {
                    // Get the product and quantity
                    $product = $orderDetail->product()->first();
                    $quantity = $orderDetail->quantity;

                    // Add the product to the products array along with the quantity
                    $this->products[] = ['product' => $product, 'quantity' => $quantity];

                    // Add the product's total cost to totalPrice (product price * quantity)
                    $this->totalPrice += ($product->price - $product->discount) * $quantity;
                }
            }
        }
    }

}
