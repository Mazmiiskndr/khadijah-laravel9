<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\RekeningCustomer;
use Faker\Factory as FakerFactory;

class RekeningCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create('id_ID');

        Customer::all()->each(function ($customer) use ($faker) {
            for ($i = 1; $i <= 3; $i++) {
                $rekening_customer = new RekeningCustomer();
                $rekening_customer->customer_id = $customer->id;
                $rekening_customer->rekening_customer_uid = str()->uuid();
                $rekening_customer->provider = $faker->word();
                $rekening_customer->rekening_name = $faker->name();
                $rekening_customer->rekening_number = $i;
                $rekening_customer->save();
            }
        });
    }
}
