<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryId = $this->faker->randomElement(range(1, 20));

        return [
            'category_id' => $categoryId,
            'product_name' => $this->faker->word(),
            'product_description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'thumbnail' => $this->faker->imageUrl(),
            'color' => $this->faker->colorName(),
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'stock' => $this->faker->numberBetween(1, 100),
            'date_added' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_updated' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
