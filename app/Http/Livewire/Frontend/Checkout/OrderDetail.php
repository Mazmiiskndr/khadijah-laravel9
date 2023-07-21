<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderPromo;
use App\Services\Order\OrderService;
use Livewire\Component;
use ReflectionClass;

class OrderDetail extends Component
{
    // Define public properties
    public $orderStatuses, $orderUid, $orders, $products, $shippingDetail, $colors, $promo;

    protected $listeners = [
        'paymentUpdated' => 'handleUpdated',
        'ratingCreated' => 'handleUpdated',
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
        $this->fetchOrderPromo();
        $this->extractProductsFromOrderDetails();
        $this->fetchShippingDetails();

        // get color for order status
        $this->colors = $orderService->getColors($this->orders->order_status);
    }

    /**
     * Renders the order-detail view component.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // Returning the order-detail view.
        return view('livewire.frontend.checkout.order-detail');
    }

    /**
     * Displays the payment modal by re-fetching the data and emitting a browser event.
     * @param  OrderService $orderService - The order service used to handle the order processes
     * @return void
     */
    public function showPaymentModal(OrderService $orderService)
    {
        // Re-fetch the data
        $this->mount($orderService);

        // Emit a browser event to show the payment modal
        $this->dispatchBrowserEvent('show-payment-modal');
    }

    /**
     * Displays the payment modal by re-fetching the data and emitting a browser event.
     * @param  OrderService $orderService - The order service used to handle the order processes
     * @return void
     */
    public function showRatingModal(OrderService $orderService,$product_uid)
    {
        // Re-fetch the data
        $this->mount($orderService);
        $this->emit('ratingModal', $product_uid);
    }

    public function orderReceived(OrderService $orderService)
    {
        // Enclose the code block within a try-catch statement
        try {
            // Use Eloquent's findOrFail method to fetch the order using order_uid.
            $order = Order::where('order_uid', $this->orderUid)->first();
            // Use Eloquent's update method to update the order_status.
            $order->update([
                'order_status' => OrderStatus::ORDER_RECEIVED,
            ]);
            // Notify the user that the update operation was successful.
            session()->flash('success', 'Pesanan Berhasil di Terima!');

            // Reset Form Fields After Updating Order Status
            $this->handleUpdated($orderService);
        } catch (\Exception $e) {
            // If there is an exception, catch it and display its message.
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
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

    public function fetchOrderPromo()
    {
        // First, check if the order_id exists in the order_promo table
        $orderPromoExists = OrderPromo::where('order_id', $this->orders->order_id)->exists();
        if($orderPromoExists) {
            // If the order_id does exist, fetch the OrderPromo and its associated promo and order
            $this->promo = OrderPromo::with('promo', 'order')->where('order_id', $this->orders->order_id)->first();
        }else {
            $this->promo = null;
        }
    }


    /**
     * Fetching the Shipping details.
     * @return void
     */
    private function fetchShippingDetails()
    {
        $this->shippingDetail = $this->orders->shippingDetail;
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

    }

    public function handleUpdated(OrderService $orderService)
    {
        // Re-fetch the data
        $this->mount($orderService);
    }

}
