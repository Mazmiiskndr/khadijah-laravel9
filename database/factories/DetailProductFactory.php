<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\DetailProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailProduct>
 */
class DetailProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DetailProduct::class;
    public function definition()
    {
        $colorNames = Color::pluck('color_name')->toArray();
        $numColors = rand(0, 1) * 2 + 1;
        $randomColorNames = collect($colorNames)->random($numColors)->toArray();
        $colors = implode(', ', $randomColorNames);

        $price = $this->faker->numberBetween(10000, 1000000);
        $discount = $this->faker->numberBetween(0, $price / 2);

        return [
            'color' => $colors,
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL', 'XXL', 'Ukuran Jumbo']),
            'price' => $price,
            'discount' => $discount,
            'stock' => $this->faker->numberBetween(1, 100),
            'product_id' => function () {
                return Product::factory()->create()->product_id;
            }
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (DetailProduct $detailProduct) {
            if ($detailProduct->discount > $detailProduct->price) {
                $detailProduct->discount = $detailProduct->price / 2;
            }
        })->afterCreating(function (DetailProduct $detailProduct) {
            //
        });
    }
}
