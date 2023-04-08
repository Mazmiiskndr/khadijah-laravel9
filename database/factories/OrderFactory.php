<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;

    public function definition()
    {
        $customer = Customer::inRandomOrder()->first();
        return [
            'order_uid' => str()->uuid(),
            'customer_id' => $customer->id,
            'order_date' => $this->faker->dateTimeThisYear(),
            'payment_date' => $this->faker->dateTimeThisYear(),
            'shipping_date' => $this->faker->dateTimeThisYear(),
            'order_status' => $this->faker->randomElement([
                'Menunggu Pembayaran',
                'Pembayaran Sedang Diverifikasi',
                'Pembayaran Berhasil',
                'Pesanan Diproses',
                'Pesanan Dikirim',
                'Pesanan Diterima',
                'Pesanan Selesai',
                'Pesanan Dibatalkan',
                'Pengembalian Dana'
            ]),
            'total_price' => 0,
            'receiver_name' => $this->faker->name(),
            'shipping_address' => $this->faker->address(),
            'shipping_city' => $this->faker->city(),
            'shipping_province' => $this->faker->state(),
            'shipping_postal_code' => $this->faker->postcode(),
            'receiver_phone' => $this->faker->phoneNumber(),
        ];
    }

    // public function withOrderDetails($count = 1)
    // {
    //     return $this->afterCreating(function (Order $order) use ($count) {
    //         $orderDetails = OrderDetail::factory()
    //             ->count($count)
    //             ->for($order) // Set order_id to the created Order model
    //             ->create();

    //         $total_price = 0;
    //         foreach ($orderDetails as $orderDetail) {
    //             $total_price += $orderDetail->price * $orderDetail->quantity;
    //         }

    //         $order->update(['total_price' => $total_price]);
    //     });
    // }
}
