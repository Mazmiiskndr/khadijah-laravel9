<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $province = Province::inRandomOrder()->first();
        $city = Regency::where('province_id', $province->id)->inRandomOrder()->first();
        $district = District::where('regency_id', $city->id)->inRandomOrder()->first();

        return [
            'customer_uid' => str()->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => $district->id,
            'address' => $this->faker->address(),
            'postal_code' => $this->faker->postcode(),
            'phone' => $this->faker->phoneNumber(),
            'registration_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'remember_token' => str()->random(10),
        ];
    }
}
