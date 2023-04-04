<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductImage::class;

    public function definition()
    {

        // Image URL
        $imageUrl = 'https://source.unsplash.com/random/1500x1500/?fashion';

        // Download Image
        $imageData = file_get_contents($imageUrl);

        // Convert Image to .webp
        $ext = 'webp';
        $imageConvert = Image::make($imageData)->encode($ext, 100);

        // Generate Unique File Name
        $fileName = uniqid() . '.' . $ext;

        // Save Image to Storage
        Storage::put('public/assets/images/product_images/' . $fileName, $imageConvert);

        return [
            'image_name' => 'assets/images/product_images/' . $fileName,
            'product_id' => function () {
                return Product::factory()->create()->product_id;
            }
        ];
    }
}
