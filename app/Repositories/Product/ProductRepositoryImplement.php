<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
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
     * Retrieve all data.
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllData()
    {
        return $this->model->latest()->get();
    }

    /**
     * Retrieve paginated data with search, filters, and sorting options.
     * @param int $perPage - Number of items per page
     * @param string $search - Search keyword
     * @param string $showing - Sorting option
     * @param array $categoryFilters - Array of category filters
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginatedData($perPage, $search, $showing, $categoryFilters)
    {
        // Join the product and category tables and apply search filters
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
        ->where(function ($query) use ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%');
        });

        // Apply category filters if available
        if (!empty($categoryFilters)) {
            $query->whereHas('category', function ($query) use ($categoryFilters) {
                $query->whereIn('category_id', $categoryFilters);
            });
        }

        // Apply sorting options
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

        // Perform pagination and return the results
        return $query->select('product.*')->paginate($perPage);
    }
    /**
     * Retrieve paginated data for frontend with search, filters, and sorting options.
     * @param int $perPage - Number of items per page
     * @param string $search - Search keyword
     * @param string $showing - Sorting option
     * @param array $categoryFilters - Array of category filters
     * @param array $sizes - Array of sizes to filter
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getProductFrontend($perPage, $search, $showing, $categoryFilters, $sizes)
    {
        // Join the product and category tables and apply search filters
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
        ->where(function ($query) use ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%');
        });

        // Apply category filters if available
        if (!empty($categoryFilters)) {
            $query->whereHas('category', function ($query) use ($categoryFilters) {
                $query->whereIn('category_id', $categoryFilters);
            });
        }

        // Apply size filters if available
        if (!empty($sizes)) {
            $query->whereIn('size', $sizes);
        }

        // Apply sorting options
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

        // Perform pagination and return the results
        return $query->select('product.*')->paginate($perPage);
    }

    /**
     * Retrieve gallery products with search option.
     * @param int $perPage - Number of items per page
     * @param string $search - Search keyword
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getGalleryProduct($perPage, $search)
    {
        // Join the product and category tables and apply search filters
        $query = $this->model->join('category', 'category.category_id', '=', 'product.category_id')
        ->where(function ($query) use ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('category_name', 'LIKE', '%' . $search . '%');
        });

        // Order the results by creation date in descending order
        $query->orderBy('created_at', 'DESC');

        // Perform pagination and return the results
        return $query->select('product.*')->paginate($perPage);
    }

    /**
     * Retrieve a product by its ID.
     * @param int $id - Product ID
     * @return \App\Models\Product
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById($id)
    {
        return $this->model->with('images', 'category', 'tags')->findOrFail($id);
    }

    /**
     * Retrieve a product by its UID.
     * @param string $uid - Product UID
     * @return \App\Models\Product|null
     */
    public function getProductByUid($uid)
    {
        return $this->model->with('images', 'category', 'tags')->where('product_uid', $uid)->first();
    }

    /**
     * Retrieve a product by its slug.
     * @param string $slug - Product slug
     * @return \App\Models\Product|null
     */
    public function getProductBySlug($slug)
    {
        return $this->model->with('images', 'category', 'tags')->where('product_slug', $slug)->first();
    }

    /**
     * Retrieve a limited number of products.
     * @param int $limit - Limit of products to retrieve
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLimitData($limit)
    {
        return $this->model->with('images')->orderBy('created_at', 'DESC')->limit($limit)->get();
    }

    /**
     * Create a new product in the database.
     * @param object $data - The data to create the product with
     * @return \App\Models\Product
     * @throws \Exception
     */
    public function createProduct($data)
    {
        try {
            // Handle the product thumbnail image upload, storing the filename
            $fileName = $this->handleThumbnail($data->thumbnail);

            // Prepare the raw product data for creation
            $productData = $this->prepareProductData($data);

            // Update the prepared product data with the filename of the uploaded thumbnail
            $productData['thumbnail'] = $fileName;

            // Add the current date and time as the date added for the product
            $productData['date_added'] = Carbon::now()->format('Y-m-d h:i:s');

            // Create the product in the database using the model and the prepared data
            $product = $this->model->create($productData);

            // Handle the product tags for the new product
            $this->handleProductTags($product, $data);

            // Handle the product images for the new product
            $this->handleProductImages($product, $data);

            // Return the newly created product
            return $product;
        } catch (\Throwable $th) {
            // Throw an exception if there was an error creating the product
            throw new \Exception('Error creating product: ' . $th->getMessage());
        }
    }

    /**
     * Update existing product in the database.
     * @param int $product_id - The id of the product to update
     * @param object $data - The data to update the product with
     * @return \App\Models\Product
     * @throws \Exception
     */
    public function updateProduct($product_id, $data)
    {
        try {
            // Find the existing product in the database
            $product = $this->model->find($product_id);

            // Throw an exception if the product could not be found
            if (!$product) throw new \Exception('Product not found');

            // If a new thumbnail is provided, handle the thumbnail update
            if ($data->thumbnail) {
                $fileName = $this->handleThumbnail($data->thumbnail, $product->thumbnail);
                $data->thumbnail = $fileName;
            }

            // Prepare the raw product data for update
            $productData = $this->prepareProductData($data, $product->id);

            // If a new thumbnail is provided, update the product data with the new thumbnail filename
            if ($data->thumbnail) {
                $productData['thumbnail'] = $fileName;
            }

            // Update the 'date_updated' field to the current date and time
            $productData['date_updated'] = Carbon::now()->format('Y-m-d h:i:s');

            // Update the product in the database with the new data
            $product->update($productData);

            // Handle any new product images
            $this->handleProductImages($product, $data);

            // Handle any new product tags
            $this->handleProductTags($product, $data);

            // Return the updated product
            return $product;
        } catch (\Exception $e) {
            // Log the error and rethrow the exception
            Log::error('Error updating product: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete existing product in the database.
     * @param mixed $product_id
     */
    public function deleteProduct($product_id)
    {
        // Find the product by its id
        $product = Product::find($product_id);

        // Check if the product exists
        if ($product) {
            // Delete associated product tags
            ProductTag::where('product_id', $product_id)->delete();

            // Delete associated product images
            $productImages = ProductImage::where('product_id', $product_id)->get();
            foreach ($productImages as $productImage) {
                // Delete the image file from storage
                Storage::delete('public/' . $productImage->image_name);
                // Delete the product image record from the database
                $productImage->delete();
            }

            // Delete the product's thumbnail image from storage
            Storage::delete('public/' . $product->thumbnail);

            // Delete the product itself from the database
            $product->delete();
        }
    }

    /**
     * Prepare product data for creation or update.
     * @param object $data - The raw product data
     * @param int|null $modelId - The id of the product model. Needed for slug uniqueness. Defaults to null for product creation
     * @return array - The prepared product data
     */
    private function prepareProductData($data, $modelId = null)
    {
        // Generate a slug from the product name
        $slug = str()->slug($data->product_name);

        // Check if the slug already exists in the database and generate a unique slug if necessary
        $count = $modelId
            ? $this->model->where('product_slug', $slug)->where('id', '!=', $modelId)->count()
            : $this->model->where('product_slug', $slug)->count();

        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;

        // Concatenate the dimensions (length, width, height) into a single string
        $dimension = $data->length . ' x ' . $data->width . ' x ' . $data->height;

        // Prepare the product data array with the required fields
        return [
            'product_name'          => $data->product_name,
            'product_slug'          => $slug,
            'category_id'           => $data->category_id,
            'price'                 => $data->price,
            'size'                  => implode(', ', $data->size),
            'color'                 => implode(', ', $data->color),
            'stock'                 => $data->stock,
            'type'                  => $data->type,
            'product_description'   => $data->product_description,
            'weight'                => $data->weight,
            'material'              => $data->material,
            'dimension'             => $dimension,
            'discount'              => $data->discount ?? 0,
        ];
    }

    /**
     * Handle thumbnail upload and replacement.
     * @param UploadedFile|null $newThumbnail - The new thumbnail to be uploaded
     * @param string|null $oldThumbnail - The existing thumbnail to be replaced
     * @return string - The file path of the handled thumbnail
     * @throws \Exception - If both new and old thumbnail are not available
     */
    private function handleThumbnail($newThumbnail, $oldThumbnail = null)
    {
        // Check if a new thumbnail is provided
        if ($newThumbnail) {
            // Generate a unique file name for the new thumbnail
            $fileName = 'assets/images/products/' . str()->random(10) . '.' . $newThumbnail->getClientOriginalExtension();

            // Store the new thumbnail in the storage
            $newThumbnail->storeAs('public', $fileName);

            // Delete the old thumbnail if it exists
            if ($oldThumbnail) {
                Storage::delete('public/' . $oldThumbnail);
            }

            // Return the file path of the new thumbnail
            return $fileName;
        }

        // If no new thumbnail is provided and there's no old thumbnail, throw an exception
        if (!$oldThumbnail) {
            throw new \Exception('No thumbnail provided for the product and no existing thumbnail found.');
        }

        // If no new thumbnail is provided, return the file path of the old thumbnail
        return $oldThumbnail;
    }

    /**
     * Handle product images.
     * @param Product $product - The product object
     * @param object $data - The data object containing product images
     */
    private function handleProductImages(Product $product, object $data)
    {
        // Check if there are new product images
        if (count($data->productImages)) {
            // Get the existing product images
            $productImages = $product->images;

            // Delete the existing product images from storage
            foreach ($productImages as $productImage) {
                Storage::delete('public/' . $productImage->image_name);
            }

            // Delete the existing product image records from the database
            $product->images()->delete();

            // Upload and create new product image records
            foreach ($data->productImages as $newProductImage) {
                // Generate a unique file name for the new product image
                $fileName = 'assets/images/product_images/' . str()->random(10) . '.' . $newProductImage->getClientOriginalExtension();

                // Store the new product image in the storage
                $newProductImage->storeAs('public', $fileName);

                // Create a new product image record in the database
                $product->images()->create([
                    'image_name' => $fileName,
                ]);
            }
        }
    }

    /**
     * Handle product tags.
     * @param Product $product - The product object
     * @param object $data - The data object containing product tags
     */
    private function handleProductTags(Product $product, object $data)
    {
        // Detach existing product tags
        $product->tags()->detach();

        // Attach the new product tags
        foreach ($data->tag_id as $tag) {
            $product->tags()->attach($tag);
        }
    }

}
