<?php

namespace App\Jobs;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use ReflectionClass;

class UpdateShipmentStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // code..
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // TODO:
        // $apiRajaOngkirService = app(ApiRajaOngkirService::class);
        // // Get all orders that need to be updated
        // $orders = Order::with('orderDetails.product', 'shippingDetail')->all();
        // dd($orders);
        // $orderStatuses = (new ReflectionClass(OrderStatus::class))->getConstants();

        // foreach ($orders as $order) {
        //     $noResi = $order->tracking_number;
        //     $courier = $order->courier;

        //     // Prepare the API URL
        //     $apiUrl = "https://api.rajaongkir.com/starter/waybill?waybill=$trackingNumber&courier=$courier";

        //     $apiResponse = $this->executeCurl($apiUrl);

        //     // check if response is not an error string
        //     if (!str_starts_with($apiResponse, "Error:")) {
        //         // extract delivery status
        //         $deliveryStatus = $apiResponse['result']['delivery_status']['status'];

        //         $order->status = $deliveryStatus;
        //         $order->save();
        //     }
        // }
    }

}
