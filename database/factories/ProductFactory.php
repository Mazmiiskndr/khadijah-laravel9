<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        $productName = ucwords($this->faker->words(3, true));
        // Image URL
        $imageUrl = 'https://source.unsplash.com/random/1500x1500/?fashion';

        // Download Image
        $imageData = file_get_contents($imageUrl);

        // Generate Unique File Name
        $fileName = uniqid() . '.jpg';

        // Save Image to Storage
        Storage::put('public/assets/images/products/' . $fileName, $imageData);

        // Get a list of color names from the 'colors' table
        $colorNames = Color::pluck('color_name')->toArray();

        // Select random number of colors (1 or 3)
        $numColors = rand(0, 1) * 2 + 1;
        $randomColorNames = collect($colorNames)->random($numColors)->toArray();

        // Combine color names into a string
        $colors = implode(', ', $randomColorNames);

        $price = $this->faker->numberBetween(10000, 1000000);
        $discount = $this->faker->numberBetween(5000, $price - 1);

        return [
            'product_uid' => str()->uuid(),
            'category_id' => $categoryId,
            'product_name' => $productName,
            'product_slug' => str()->slug($productName, '-'),
            'product_description' => $this->faker->paragraph(),
            'dimension' => $this->faker->randomNumber(2) . " x " . $this->faker->randomNumber(2) . " x " . $this->faker->randomNumber(2),
            'type' => $this->faker->randomElement(['Basic', 'Premium', 'Exclusive']),
            'price' => $price,
            'discount' => $discount,
            'color' => $colors,
            'stock' => $this->faker->numberBetween(1, 100),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL', 'XXL','XXXL', 'Super Jumbo']),
            'material' => $this->faker->word(),
            'thumbnail' => 'assets/images/products/' . $fileName, // Set Thumbnail to the Saved File Name
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'date_added' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_updated' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),

        ];

    }
}
