<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryName = ucwords(trim(preg_replace('/\s+/', ' ', strtolower($this->faker->word()))));

        return [
            'category_name' => $categoryName,
            'category_description' => $this->faker->paragraph(),
        ];
    }
}
