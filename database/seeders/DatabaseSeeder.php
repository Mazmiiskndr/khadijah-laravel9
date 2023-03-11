<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Promo;
use App\Models\Tag;
use App\Models\User;
use App\Models\Visitor;
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
        // Customer::factory()->create([
        //     'name' => 'Moch Azmi Iskandar',
        //     'email' => 'azmiiskandar0@gmail.com',
        //     'password' => Hash::make('tasik123'),
        //     'province_id' => '32',
        //     'city_id' => '3278',
        //     'district_id' => '3278010',
        //     'address' => 'Perum Mitra Batik',
        //     'postal_code' => '46182',
        //     'phone' => '+62 8211-892-3691',
        //     'registration_date' => now(),
        //     'remember_token' => str()->random(10)
        // ]);
        $this->call(IndoRegionProvinceSeeder::class);
        $this->call(IndoRegionRegencySeeder::class);
        $this->call(IndoRegionDistrictSeeder::class);
        // $this->call(IndoRegionVillageSeeder::class);
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        User::factory(50)->create();
        Visitor::factory(100)->create();
        Promo::factory(50)->create();
        Category::factory(50)->create();
        Tag::factory(50)->create();
        // PRODUCT TAGS AND PRODUCT IMAGES
        Product::factory()->count(150)->create()->each(function ($product) {
            // For each product, generate 3-5 product tags
            $tag_ids = Tag::pluck('tag_id')->random(rand(3, 5))->toArray();
            $product->tags()->attach($tag_ids);
            // For each productImages, generate 1-3 product Images
            $images = ProductImage::factory()->count(rand(1, 3))->make();
            $product->images()->createMany($images->toArray());
        });
        Customer::factory(100)->create();

    }
}
