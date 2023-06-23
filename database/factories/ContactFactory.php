<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'province_id' => rand(1, 10),
            'city_id' => rand(1, 100),
            'shop_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'tiktok' => $this->faker->userName,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->userName,
            'shopee' => $this->faker->userName,
            'tokped' => $this->faker->userName,
        ];
    }
}
