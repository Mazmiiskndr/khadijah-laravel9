<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
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
        $order_date = $this->faker->dateTimeThisYear();
        return [
            'order_uid' => str()->uuid(),
            'customer_id' => $customer->id,
            'order_date' => $order_date,
            'order_number' => '',
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
            'order_type' => $this->faker->randomElement(['COD', 'BANK']),
            'total_price' => 0,
            'receiver_name' => $this->faker->name(),
            'shipping_address' => $this->faker->address(),
            'shipping_city' => $this->faker->city(),
            'shipping_province' => $this->faker->state(),
            'shipping_postal_code' => $this->faker->postcode(),
            'receiver_phone' => $this->faker->phoneNumber(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            // Format the date and get the count of today's orders
            $date = Carbon::parse($order->order_date);
            $dateFormatted = $date->format('ymd');
            $countToday = Order::whereDate('order_date', $date)->count();

            // Create the order number
            $order->order_number = 'ORD-' . $dateFormatted . str_pad($countToday + 1, 6, '0', STR_PAD_LEFT);
            $order->save();
        });
    }
}
