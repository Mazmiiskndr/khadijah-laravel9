<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ProductRepositoryImplement extends Eloquent implements ProductRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData()
    {
        return $this->model->latest()->get();
    }


    /**
     * getPaginatedData
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @return void
     */
    public function getPaginatedData($perPage, $search, $showing, $categoryFilters)
    {
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
            ->where(function ($query) use ($search) {
                $query->where('product_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('category_name', 'LIKE', '%' . $search . '%');
            });

        if (!empty($categoryFilters)) {
            $query->whereHas('category', function ($query) use ($categoryFilters) {
                $query->whereIn('category_id', $categoryFilters);
            });
        }

        switch ($showing) {
            case 'featured':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'lowest_price':
                $query->orderByRaw('price - IFNULL(discount, 0) ASC');
                break;
            case 'highest_price':
                $query->orderByRaw('price - IFNULL(discount, 0) DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        $query = $query->select('product.*')->paginate($perPage);

        return $query;
    }

    /**
     * getProductFrontend
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @param  mixed $showing
     * @param  mixed $categoryFilters
     * @param  mixed $sizes
     * @return void
     */
    public function getProductFrontend($perPage, $search, $showing, $categoryFilters, $sizes)
    {
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
            ->where(function ($query) use ($search) {
                $query->where('product_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('category_name', 'LIKE', '%' . $search . '%');
            });

        if (!empty($categoryFilters)) {
            $query->whereHas('category', function ($query) use ($categoryFilters) {
                $query->whereIn('category_id', $categoryFilters);
            });
        }
        if (!empty($sizes)) {
            $query->whereIn('size', $sizes);
        }

        switch ($showing) {
            case 'featured':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'lowest_price':
                $query->orderByRaw('price - IFNULL(discount, 0) ASC');
                break;
            case 'highest_price':
                $query->orderByRaw('price - IFNULL(discount, 0) DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC');
                break;
        }

        $query = $query->select('product.*')->paginate($perPage);

        return $query;
    }

    /**
     * getGalleryProduct
     *
     * @param  mixed $perPage
     * @param  mixed $search
     * @return void
     */
    public function getGalleryProduct($perPage, $search)
    {
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
            ->where(function ($query) use ($search) {
                $query->where('product_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('category_name', 'LIKE', '%' . $search . '%');
            });
        $query->orderBy('created_at', 'DESC');

        $query = $query->select('product.*')->paginate($perPage);

        return $query;
    }


    /**
     * findById
     *
     * @param  mixed $id
     * @return void
     */
    public function findById($id)
    {
        return $this->model->with('images', 'category', 'tags')->findOrFail($id);
    }


    /**
     * getProductByUid
     *
     * @param  mixed $uid
     * @return void
     */
    public function getProductByUid($uid)
    {
        return $this->model->with('images', 'category', 'tags')->where('product_uid', $uid)->first();
    }

    /**
     * getProductBySlug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getProductBySlug($slug)
    {
        return $this->model->with('images', 'category', 'tags')->where('product_slug', $slug)->first();
    }

    /**
     * getLimitData
     *
     * @param  mixed $limit
     */
    public function getLimitData($limit)
    {
        return $this->model->with('images')->orderBy('created_at', 'DESC')->limit($limit)->get();
    }

    public function createProduct($data)
    {
        try {
            // Save Image Thumbnail to Server
            $image = $data->thumbnail;
            $ext = 'webp';
            $imageConvert = Image::make($image->getRealPath())->encode($ext, 100);
            $fileName = 'assets/images/products/' . uniqid(10) . '.' . $ext;
            Storage::put('public/' . $fileName, $imageConvert);

            // Implode Array Size
            $size = implode(', ', $data->size);
            $color = implode(', ', $data->color);

            // Create Unique Slug
            $slug = str()->slug($data->product_name);
            $count = $this->model->where('product_slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            // Insert data and Del
            $product = $this->model->create([
                'product_name'          => $data->product_name,
                'product_slug'          => $slug,
                'category_id'           => $data->category_id,
                'price'                 => $data->price,
                'size'                  => $size,
                'stock'                 => $data->stock,
                'thumbnail'             => $fileName,
                'color'                 => $color,
                'type'                  => $data->type,
                'product_description'   => $data->product_description,
                'weight'                => $data->weight,
                'material'              => $data->material,
                'dimension'             => $data->dimension,
                'discount'              => $data->discount ? $data->discount : 0,
                'date_added'            => Carbon::now()->format('Y-m-d h:i:s'),
            ]);

            $tags = $data->tag_id;
            foreach ($tags as $tag) {
                // Create Object New ProductTag
                $productTag = new ProductTag();
                $productTag->product_id = $product->product_id; // id produk yang sedang dibuat
                $productTag->tag_id = $tag;
                $productTag->save();
            }

            // Insert Images
            foreach ($data->productImages as $productImage) {
                // Save file to server
                $image = $productImage;
                $ext = 'webp';
                $imageConvert = Image::make($image->getRealPath())->encode($ext, 100);
                $fileProductImages = 'assets/images/product_images/' . uniqid(10) . '.' . $ext;
                Storage::put('public/' . $fileProductImages, $imageConvert);
                // Create Object New ProductImage
                $image = new ProductImage();
                $image->product_id = $product->product_id; // id produk yang sedang dibuat
                $image->image_name = $fileProductImages;
                $image->save();
            }

            // Return the created product
            return $product;
        } catch (\Throwable $th) {
            // Return the error message
            return $th->getMessage();
        }
    }



    /**
     * updateProduct
     * @param  mixed $product_id
     * @param  mixed $data
     */
    public function updateProduct($product_id, $data)
    {
        $product = $this->model->find($product_id);
        if ($product) {
            $productData = [];

            // Check if thumbnail is uploaded
            if ($data->thumbnail) {
                // Update Thumbnail
                // Convert and store the new thumbnail in .webp format
                $image = $data->thumbnail;
                $ext = 'webp';
                $imageConvert = Image::make($image->getRealPath())->encode($ext, 100);
                $fileName = 'assets/images/products/' . uniqid(10) . '.' . $ext;
                Storage::put('public/' . $fileName, $imageConvert);
                // Delete previous thumbnail if exists
                if ($product->thumbnail) {
                    Storage::delete('public/' . $product->thumbnail);
                }
                $productData = [
                    'thumbnail' => $fileName,
                ];
            }

            // Check if product images are uploaded
            if (count($data->productImages)) {
                // Delete previous product images if exists
                $productImages = $product->images;
                foreach ($productImages as $productImage) {
                    // Delete existing image file from storage
                    Storage::delete('public/' . $productImage->image_name);
                }
                // Delete product image records from the database
                $product->images()->delete();

                // Upload new product images
                foreach ($data->productImages as $newProductImage) {
                    // Convert and store new product image in .webp format
                    $image = $newProductImage;
                    $ext = 'webp';
                    $imageConvert = Image::make($image->getRealPath())->encode($ext, 100);
                    $fileProductImages = 'assets/images/product_images/' . uniqid(10) . '.' . $ext;
                    Storage::put('public/' . $fileProductImages, $imageConvert);

                    // Create new product image record in the database
                    $product->images()->create([
                        'image_name' => $fileProductImages,
                    ]);
                }
            }

            // Remove existing tags
            $product->tags()->detach();

            // Add new tags
            $tags = $data->tag_id;
            foreach ($tags as $tag) {
                $product->tags()->attach($tag);
            }

            // Update other product fields
            // Implode Array Size
            $size = implode(', ', $data->size);
            // Implode Array Color
            $color = implode(', ', $data->color);
            // DateNow for Updated
            $dateNow = Carbon::now()->format('Y-m-d h:i:s');
            // Declare Product Data

            $productData += [
                'product_name'          => $data->product_name,
                'product_slug'          => str()->slug($data->product_name),
                'category_id'           => $data->category_id,
                'price'                 => $data->price,
                'size'                  => $size,
                'color'                 => $color,
                'stock'                 => $data->stock,
                'type'                  => $data->type,
                'product_description'   => $data->product_description,
                'weight'                => $data->weight,
                'material'              => $data->material,
                'dimension'             => $data->dimension,
                'discount'              => $data->discount ? $data->discount : 0,
                'date_updated'          => $dateNow,
            ];

            // Update Product
            $product->update($productData);

            // Return updated product
            return $product;
        }
        return null;
    }

    /**
     * deleteProduct
     * @param  mixed $product_id
     * @param  mixed $data
     */
    public function deleteProduct($product_id, $data)
    {
        $product = Product::find($data->product_id);
        if ($product) {
            $productTag = ProductTag::where('product_id', $data->product_id)->delete();

            // Menghapus product images
            $productImages = ProductImage::where('product_id', $data->product_id)->get();
            foreach ($productImages as $productImage) {
                // Delete Image from Storage
                Storage::delete('public/' . $productImage->image_name);
                // Hapus record product image dari database
                $productImage->delete();
            }
            // Delete Thumbnail from Storage
            Storage::delete('public/' . $product->thumbnail);
            $product->delete();
            return $product;
        }
        return null;
    }
}
