<?php

namespace App\Http\Livewire\Backend\Sales\Detail;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderPromo;
use App\Models\ShippingDetail;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Order\OrderService;
use Livewire\Component;
use ReflectionClass;

class Form extends Component
{
    // Define public properties for UpdateStatus
    public $orderStatuses, $order_uid, $orders, $shippingDetail, $colors, $order_status, $promo;

    // Define public properties for UpdateWayBill
    public $tracking_number, $noResi, $manifests, $statusResi;

    protected $listeners = [
        'orderUpdated' => 'handleUpdated',
        'wayBillUpdated' => 'handleUpdated',
    ];

    protected function getRulesOrderStatus()
    {
        return [
            'order_status' => 'required',
        ];
    }
    protected function getMessagesOrderStatus()
    {
        return [
            'order_status.required' => 'Status Order wajib diisi.',
        ];
    }

    protected function getRulesWayBill()
    {
        return [
            'tracking_number' => 'required',
        ];
    }
    protected function getMessagesWayBill()
    {
        return [
            'tracking_number.required' => 'No Resi wajib diisi.',
        ];
    }

    /**
     * This function will run when the component is being created.
     * @param  App\Services\OrderService  $orderService
     * @return void
     */
    public function mount(OrderService $orderService, ApiRajaOngkirService $apiRajaOngkirService) {
        // Load order status, order details, shipping details and waybill
        $this->loadOrderData($orderService, $apiRajaOngkirService);
    }

    /**
     * Load data when component is mounted or refreshed.
     * @param  App\Services\OrderService  $orderService
     * @return void
     */
    private function loadOrderData(OrderService $orderService, ApiRajaOngkirService $apiRajaOngkirService)
    {
        // Fetch the order status values from the OrderStatus enum.
        $this->orderStatuses = (new ReflectionClass(OrderStatus::class))->getConstants();

        // Fetch the order details by the order UID.
        $this->orders = $orderService->getOrderWithUid($this->order_uid);
        $this->fetchOrderPromo();

        // Fetch the Shipping details.
        $this->shippingDetail = $this->orders->shippingDetail;
        $this->noResi = $this->shippingDetail['tracking_number'] ?? null;

        // Fetch the WayBill details.
        if ($this->noResi) {
            $waybill = $apiRajaOngkirService->getWayBill($this->noResi, $this->shippingDetail['expedition']);
            if (isset($waybill['status']['code']) && $waybill['status']['code'] == 200) {
                $this->manifests = $waybill['result']['manifest'];
                $this->statusResi = $waybill['result']['delivery_status']['status'];
            }
        }

        // get color for order status
        $this->colors = $orderService->getColors($this->orders->order_status);
    }

    /**
     * Fetches the order promo for the current order.
     * This method checks if an order promo exists for the current order. If it exists, it retrieves the order promo along with its associated promo and order.
     * If it does not exist, it sets the promo property to null.
     * @return void
     */
    public function fetchOrderPromo()
    {
        // First, check if the order_id exists in the order_promo table
        $orderPromoExists = OrderPromo::where('order_id', $this->orders->order_id)->exists();
        if ($orderPromoExists) {
            // If the order_id does exist, fetch the OrderPromo and its associated promo and order
            $this->promo = OrderPromo::with('promo', 'order')->where('order_id', $this->orders->order_id)->first();
        } else {
            $this->promo = null;
        }
    }

    /**
     * Handle updated property UpdateStatus.
     * @param string $property
     */
    public function updatedOrderStatus($property)
    {
        // Validate only the updated property
        $this->validateOnly($property,$this->getRulesWayBill(), $this->getMessagesWayBill());
    }

    /**
     * Handle updated property UpdateStatus.
     * @param string $property
     */
    public function updatedTrackingNumber($property)
    {
        // Validate only the updated property
        $this->validateOnly($property,$this->getRulesOrderStatus(), $this->getMessagesOrderStatus());
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
     * The method to update the order status.
     * It uses Laravel's Eloquent model's update method.
     * @return void
     */
    public function updateStatus()
    {
        $this->validate($this->getRulesOrderStatus(), $this->getMessagesOrderStatus());
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

    public function handleUpdated(OrderService $orderService, ApiRajaOngkirService $apiRajaOngkirService)
    {
        $this->mount($orderService, $apiRajaOngkirService);
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

    /**
     * Store the waybill and update the order status based on the tracking number.
     * @param ApiRajaOngkirService $apiRajaOngkirService An instance of the RajaOngkir API service.
     * @return void
     */
    public function storeWaybill(ApiRajaOngkirService $apiRajaOngkirService)
    {
        // Validate waybill
        $this->validate($this->getRulesWayBill(), $this->getMessagesWayBill());

        try {
            // Validate the tracking number.
            $checkTrackingNumber = $this->validateTrackingNumber($apiRajaOngkirService);

            // If the API response status code is greater than or equal to 200, proceed with the update
            if (isset($checkTrackingNumber['status']['code']) >= 200) {
                $this->resetErrorBag();
                // Update the shipping detail based on the tracking number
                $shippingDetail = $this->updateShippingDetail();
                // Update the order status based on the tracking number status
                $statusTrackingNumber = $checkTrackingNumber['result']['summary']['status'];
                $this->updateOrderStatusByTrackingNumber($statusTrackingNumber);

                // Notify the user that the update operation was successful.
                session()->flash('success', 'Tracking Number has been successfully updated!');
                // Reset Form Fields After Updating Order Status
                $this->emit('wayBillUpdated', $shippingDetail);
            }
        } catch (\Exception $e) {
            // If there is an exception, catch it and display its message.
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Validate the tracking number.
     * @return void
     */
    private function validateTrackingNumber(ApiRajaOngkirService $apiRajaOngkirService)
    {
        // Check if the tracking number is valid using the RajaOngkir API service
        // $this->shippingDetail['expedition'] TODO:
        $checkTrackingNumber = $apiRajaOngkirService->getWayBill($this->tracking_number, $this->shippingDetail['expedition']);
        // If the tracking number is invalid, add an error and stop execution
        if ($checkTrackingNumber >= 400) {
            $this->addError('tracking_number', 'No Resi Salah . Tolong masukan No Resi yang valid!');
        }
        return $checkTrackingNumber;
    }

    /**
     * Update the shipping detail using the order_id.
     * @return ShippingDetail|null
     */
    private function updateShippingDetail()
    {
        $shippingDetail =  ShippingDetail::where('order_id', $this->orders->order_id)->first();
        // Update the tracking number
        $shippingDetail->update([
            'tracking_number' => $this->tracking_number,
        ]);
    }

    /**
     * Update the order status based on the tracking number status.
     * @param string $status The tracking number status.
     * @return void
     */
    private function updateOrderStatusByTrackingNumber($status)
    {
        // Use Eloquent's findOrFail method to fetch the order using order_uid.
        $order = Order::find($this->orders->order_id);

        // Use Eloquent's update method to update the order_status based on the tracking number status.
        if ($status == 'ON PROCESS') {
            $order->update([
                'order_status' => OrderStatus::ORDER_SENT,
            ]);
        } else if ($status == 'DELIVERED') {
            $order->update([
                'order_status' => OrderStatus::ORDER_RECEIVED,
            ]);
        }
    }



}
