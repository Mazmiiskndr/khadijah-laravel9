<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrderDetail::class;

    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $quantity = $this->faker->numberBetween(1, 10);
        $price = $product->price;
        return [
            'order_detail_uid' => str()->uuid(),
            'order_id' => null,
            'product_id' => $product->product_id,
            'price' => $price,
            'quantity' => $quantity,
        ];
    }
}
