<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
     * @return array
     */
    public function definition()
    {
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

        // Return an array representing the default state of the model. This includes randomly generated data for some fields,
        // as well as the province_id and city_id retrieved from the RajaOngkirService.
        return [
            'customer_uid' => str()->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'province_id' => $province['province_id'],
            'city_id' => $city['city_id'],
            'address' => $this->faker->address(),
            'postal_code' => $city['postal_code'],
            'phone' => $this->faker->phoneNumber(),
            'registration_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'remember_token' => str()->random(10),
        ];
    }


}
