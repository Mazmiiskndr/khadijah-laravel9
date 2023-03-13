<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Faker\Provider\id_ID\Color as ColorProvider;

class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create('id_ID');
        $faker->addProvider(new ColorProvider($faker));

        // Generate random color name
        $colorName = $faker->colorName();

        return [
            'color_name' => $colorName,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Color $color) {
            // Make sure color name is unique
            while (Color::where('color_name', $color->color_name)->exists()) {
                $color->color_name = $this->faker->colorName();
            }
        });
    }
}
