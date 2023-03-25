<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\RekeningCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RekeningCustomer>
 */
class RekeningCustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RekeningCustomer::class;

    public function definition()
    {
        $faker = FakerFactory::create('id_ID');
        $customer = Customer::inRandomOrder()->first(); // select random customer from the database
        return [
            'customer_id' => $customer->id,
            'rekening_customer_uid' => str()->uuid(),
            'provider' => $faker->word(),
            'rekening_name' => $faker->name(),
            'rekening_number' => $faker->numberBetween(1000000000, 999999999999),
        ];
    }
}
