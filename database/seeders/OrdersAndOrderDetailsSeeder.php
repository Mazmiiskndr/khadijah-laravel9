<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShippingDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersAndOrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $order = Order::factory()->create();
            $total_price = 0;

            for ($j = 0; $j < 5; $j++) {
                $orderDetail = OrderDetail::factory()->make(['order_id' => $order->order_id]);
                $orderDetail->save();
                $total_price += $orderDetail->price * $orderDetail->quantity;
            }

            $order->total_price = $total_price;
            $order->save();

            // Create ShippingDetail for this order
            $shippingDetail = ShippingDetail::factory()->make([
                'order_id' => $order->order_id,
                // fill in more attributes here if necessary
            ]);
            $shippingDetail->save();
        }
    }
}
