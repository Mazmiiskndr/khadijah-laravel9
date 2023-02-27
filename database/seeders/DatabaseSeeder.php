<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()->create([
            'name' => 'Moch Azmi Iskandar',
            'email' => 'azmiiskandar0@gmail.com',
            'password' => Hash::make('tasik123'),
            'address' => 'Perum Mitra Batik',
            'city' => 'Kota Tasikmalaya',
            'province' => 'Jawa Barat',
            'postal_code' => '46182',
            'phone' => '+62 8211-892-3691',
            'registration_date' => now(),
        ]);
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        User::factory(50)->create();
        Category::factory(50)->create();
        Product::factory(50)->create();
        Customer::factory()
            ->count(100)
            ->state(new Sequence(
                ['province' => 'DKI Jakarta'],
                ['province' => 'Jawa Barat'],
                ['province' => 'Jawa Tengah'],
                ['province' => 'Jawa Timur']
            ))
            ->create();

    }
}
