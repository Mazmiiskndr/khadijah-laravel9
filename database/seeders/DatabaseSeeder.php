<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\DetailProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Promo;
use App\Models\RekeningCustomer;
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

        $this->call(ColorSeeder::class);
        $this->call(ContactSeeder::class);
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
        // Customer::factory(100)->create();

        Customer::factory()->count(20)->create()->each(function ($customer) {
            // For each Customer, generate 3-5 RekeningCustomer
            $numRekening = rand(1, 3);
            $rekenings = RekeningCustomer::factory()->count($numRekening)->make(['customer_id' => $customer->id]);
            $customer->rekening_customers()->createMany($rekenings->toArray());
        });
        // PRODUCT TAGS, PRODUCT IMAGES AND DETAIL PRODUCTS
        Product::factory()->count(20)->create()->each(function ($product) {

            // For each product, generate 3-5 product tags
            $numTags = rand(3, 5);
            $tag_ids = Tag::pluck('tag_id')->random($numTags)->toArray();
            $product->tags()->attach($tag_ids, ['product_id' => $product->product_id]);

            // For each productImages, generate 1-3 product Images
            $numImages = rand(1,2);
            $images = ProductImage::factory()->count($numImages)->make(['product_id' => $product->product_id]);
            $product->images()->createMany($images->toArray());
        });

        $this->call(OrdersAndOrderDetailsSeeder::class);



    }
}
