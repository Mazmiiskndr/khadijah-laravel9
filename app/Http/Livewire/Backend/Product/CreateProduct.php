<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    // Declare variable
    public   $product_name, $material, $product_slug,
            $category_id,
            $price, $discount,
            $dimension, $type,
            $color,
            $weight, $stock,
            $product_description,
            $thumbnail, $productImages = [];
    public $tag_id = [];
    public $colors = [];
    public $size = [];

    // Declare Categories and Tags
    public $categories, $tags = [];

    // Modal
    public $createModal = false;

    // Listeners
    protected $listeners = [
        'productCreated' => '$refresh',
        'tagIdSelected' => 'tagSelected',
    ];

    // Rules Validation
    protected $rules = [
        // Required
        'product_name'          => 'required',
        'category_id'           => 'required',
        'price'                 => 'required',
        'size'                  => 'required',
        'stock'                 => 'required',
        'thumbnail'             => 'required|image|max:5120',
        'productImages.*'       => 'image|max:20480',
        'weight'                => 'required',
        // Nullable
        'color'                 => 'nullable',
        'product_description'   => 'nullable',
        'type'                  => 'nullable',
        'material'              => 'nullable',
        'dimension'             => 'nullable',
        'discount'              => 'nullable'
    ];

    // Make Validation message
    protected $messages = [
        'product_name.required' => 'Nama Produk harus diisi',
        'category_id.required'  => 'Kategori harus diisi',
        'price.required'        => 'Harga harus diisi',
        'size.required'         => 'Ukuran harus diisi',
        'stock.required'        => 'Stok harus diisi',
        'weight.required'       => 'Berat harus diisi',
        'thumbnail.required'    => 'Thumbnail harus diisi',
        'thumbnail.max'         => 'Ukuran gambar maksimal 5mb',
        'productImages.*.max'   => 'Ukuran gambar maksimal 20mb',
        'thumbnail.image'       => 'Format harus berupa gambar',
        'productImages.*.image' => 'Format harus berupa gambar',
    ];

    /**
     * updated
     *
     * @param  mixed $property
     * @return void
     */
    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }


    /**
     *
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->resetFields();
        $this->categories   = Category::orderBy('created_at', 'DESC')->get();
        $this->tags         = Tag::orderBy('created_at', 'DESC')->get();
        $this->colors       = Color::orderBy('color_name', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.backend.product.create-product');
    }



    /**
     * submit
     *
     * @return void
     */
    public function submit(ProductService $productService)
    {

        // Make Validation
        $this->validate();
        $createdProduct = $productService->createProduct($this);
        if ($createdProduct instanceof Product) {
            // Set Flash Message
            session()->flash('success', 'Produk Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
            // Emit event to reload datatable
            $this->emit('productCreated', $createdProduct);
            $this->dispatchBrowserEvent('close-modal');
        } else {
            // Flash Message
            session()->flash('error', $createdProduct);

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
        // try {
        //     // Save Image Thumbnail to Server
        //     $image = $this->thumbnail;
        //     $ext = 'webp';
        //     $imageConvert = Image::make($image->getRealPath())->encode($ext, 100);
        //     $fileName = 'assets/images/products/' . uniqid(10) . '.' . $ext;
        //     Storage::put('public/' . $fileName, $imageConvert);

        //     // Implode Array Size
        //     $size = implode(', ', $this->size);
        //     $color = implode(', ', $this->color);

        //     // Create Unique Slug
        //     $slug = str()->slug($this->product_name);
        //     $count = Product::where('product_slug', $slug)->count();
        //     if ($count > 0) {
        //         $slug = $slug . '-' . ($count + 1);
        //     }
        //     // Insert data and Del
        //     $product = Product::create([
        //         'product_name'          => $this->product_name,
        //         'product_slug'          => $slug,
        //         'category_id'           => $this->category_id,
        //         'price'                 => $this->price,
        //         'size'                  => $size,
        //         'stock'                 => $this->stock,
        //         'thumbnail'             => $fileName,
        //         'color'                 => $color,
        //         'type'                  => $this->type,
        //         'product_description'   => $this->product_description,
        //         'weight'                => $this->weight,
        //         'material'              => $this->material,
        //         'dimension'             => $this->dimension,
        //         'discount'              => $this->discount ? $this->discount : 0,
        //         'date_added'            => Carbon::now()->format('Y-m-d h:i:s'),
        //     ]);

        //     $tags = $this->tag_id;
        //     foreach ($tags as $tag) {
        //         // Create Object New ProductTag
        //         $productTag = new ProductTag();
        //         $productTag->product_id = $product->product_id; // id produk yang sedang dibuat
        //         $productTag->tag_id = $tag;
        //         $productTag->save();
        //     }

        //     // Insert Images
        //     foreach ($this->productImages as $productImage) {
        //         // Save file to server
        //         $image = $productImage;
        //         $ext = 'webp';
        //         $imageConvert = Image::make($image->getRealPath())->encode($ext, 100);
        //         $fileProductImages = 'assets/images/product_images/' . uniqid(10) . '.' . $ext;
        //         Storage::put('public/' . $fileProductImages, $imageConvert);
        //         // Create Object New ProductImage
        //         $image = new ProductImage();
        //         $image->product_id = $product->product_id; // id produk yang sedang dibuat
        //         $image->image_name = $fileProductImages;
        //         $image->save();
        //     }

        //     // Set Flash Message
        //     session()->flash('success', 'Produk Berhasil di Tambahkan!');

        //     // Reset Form Fields After Creating Category
        //     $this->resetFields();
        //     // Emit event to reload datatable
        //     $this->emit('productCreated', $product);
        //     $this->dispatchBrowserEvent('close-modal');
        // } catch (\Throwable $th) {
        //     // Flash Message
        //     session()->flash('error', $th->getMessage());

        //     // Reset Form Fields After Creating Category
        //     $this->resetFields();
        // }
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->createModal = false;
        $this->resetFields();
    }

    /**
     * resetFields
     *
     * @return void
     */
    public function resetFields()
    {
        $this->tag_id             = [];
        $this->product_name         = '';
        $this->productImages        = [];
        $this->category_id          = '';
        $this->price                = '';
        $this->size                 = '';
        $this->stock                = '';
        $this->thumbnail            = null;
        $this->color                = '';
        $this->type                 = '';
        $this->product_description  = '';
        $this->weight               = '';
        $this->material             = '';
        $this->dimension            = '';
        $this->discount             = '';
    }
}
