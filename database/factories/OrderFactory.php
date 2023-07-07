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
        // Instantiate the RajaOngkirService by resolving it out of the service container.
        $rajaOngkirService = app(\App\Services\ApiRajaOngkir\ApiRajaOngkirService::class);

        // Call the getProvinces method on the service to get a list of provinces.
        $provinces = $rajaOngkirService->getProvinces();

        // Select a random province from the array of provinces.
        $province = $provinces[array_rand($provinces)];

        // Call the getCities method on the service, passing in the id of the randomly selected province, to get a list of cities in that province.
        $cities = $rajaOngkirService->getCities($province['province_id']);

        // Select a random city from the array of cities.
        $city = $cities[array_rand($cities)];

        // Call the getDistricts method on the service, passing in the id of the randomly selected province, to get a list of districts in that province.
        $districts = $rajaOngkirService->getSubDistrictByCity($city['city_id']);

        // Select a random city from the array of districts.
        $district = $districts[array_rand($districts)];
        return [
            'order_uid' => str()->uuid(),
            'customer_id' => $customer->id,
            'order_date' => $order_date,
            'order_number' => '',
            'payment_date' => $this->faker->dateTimeThisYear(),
            'shipping_date' => $this->faker->dateTimeThisYear(),
            'order_status' => $this->faker->randomElement([
                'Menunggu Pembayaran',
                'Sedang Diverifikasi',
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
            'shipping_city' => $district['city'],
            'shipping_province' => $district['province'],
            'shipping_district' => $district['subdistrict_name'],
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
