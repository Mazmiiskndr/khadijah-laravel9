<?php

namespace App\Http\Livewire\Backend\Sales\Detail;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Services\Order\OrderService;
use Livewire\Component;
use ReflectionClass;

class Form extends Component
{
    // Define public properties
    public $orderStatuses, $order_uid, $orders, $shippingDetail, $colors, $order_status;

    protected $listeners = [
        'orderUpdated' => 'handleOrderUpdated',
    ];

    // Validation rules
    protected $rules = [
        'order_status' => 'required',
    ];

    // Validation error messages
    protected $messages = [
        'order_status.required' => 'Status Order wajib diisi.',
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
     * Handle updated property.
     * @param string $property
     */
    public function updated($property)
    {
        // Validate only the updated property
        $this->validateOnly($property);
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

    /**
     * The method to update the order status.
     * It uses Laravel's Eloquent model's update method.
     * @return void
     */
    public function updateStatus()
    {
        // Enclose the code block within a try-catch statement
        try {
            // Use Eloquent's findOrFail method to fetch the order using order_uid.
            $order = Order::find($this->orders->order_id);
            // Use Eloquent's update method to update the order_status.
            $order->update([
                'order_status' => $this->order_status,
            ]);
            // Notify the user that the update operation was successful.
            session()->flash('success', 'Status Order Berhasil di Update!');

            // Reset Form Fields After Updating Order Status
            $this->emit('orderUpdated', $order);
        } catch (\Exception $e) {
            // If there is an exception, catch it and display its message.
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function handleOrderUpdated(OrderService $orderService)
    {
        $this->mount($orderService);
    }

    /**
     * Download the payment proof file.
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|void
     */
    public function downloadPaymentProof()
    {
        // Define the file path
        $filePath = storage_path('app/public/' . $this->orders->payment_proof);
        // Check if the file exists
        if (file_exists($filePath)) {
            // If the file exists, return a download response
            return response()->download($filePath);
        } else {
            // If the file is not found, flash an error message to the session
            session()->flash('error', 'Bukti Pembyaran Tidak di Temukan.');
        }
    }



}
