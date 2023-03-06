<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductTag>
 */
class ProductTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductTag::class;

    public function definition()
    {
        return [
            'product_id' => function () {
                return Product::factory()->create()->product_id;
            },
            'tag_id' => function () {
                return Tag::factory()->create()->tag_id;
            }
        ];
    }


}
