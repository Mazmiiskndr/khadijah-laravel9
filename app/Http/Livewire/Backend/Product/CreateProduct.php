<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Carbon\Carbon;
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
        'thumbnail'             => 'required|max:5120',
        'productImages'         => 'max:10240',
        // Nullable
        'color'                 => 'nullable',
        'type'                  => 'nullable',
        'product_description'   => 'nullable',
        'weight'                => 'nullable',
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
        'thumbnail.required'    => 'Thumbnail harus diisi',
        'thumbnail.max'         => 'Ukuran gambar maksimal 5mb',
        'productImages.max'     => 'Ukuran gambar maksimal 5mb',
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

    // *** TODO: ***
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
    public function submit()
    {

        // Make Validation
        $this->validate();

        // Gunakan Try Catch
        try {
            // Insert Thumbnail
            $fileName = $this->thumbnail->store('assets/images/products','public');
            // Implode Array Size
            $size = implode(', ', $this->size);
            // dd($size);
            // Insert data and Del
            $product = Product::create([
                'product_name'          => $this->product_name,
                'product_slug'          => str()->slug($this->product_name),
                'category_id'           => $this->category_id,
                'price'                 => $this->price,
                'size'                  => $size,
                'stock'                 => $this->stock,
                'thumbnail'             => $fileName,
                'color'                 => $this->color,
                'type'                  => $this->type,
                'product_description'   => $this->product_description,
                'weight'                => $this->weight,
                'material'              => $this->material,
                'dimension'             => $this->dimension,
                'discount'              => $this->discount,
                'date_added'            => Carbon::now()->format('Y-m-d h:i:s'),
            ]);

            $tags = $this->tag_id;
            foreach ($tags as $tag) {
                // Buat objek ProductTag baru
                $productTag = new ProductTag();
                $productTag->product_id = $product->product_id; // id produk yang sedang dibuat
                $productTag->tag_id = $tag;
                $productTag->save();
            }

            // Insert Images
            foreach ($this->productImages as $productImage) {
                // Simpan file gambar ke dalam direktori "product_images"
                $fileProductImages = $productImage->store('assets/images/product_images','public');
                // Buat objek ProductImage baru
                $image = new ProductImage();
                $image->product_id = $product->product_id; // id produk yang sedang dibuat
                $image->image_name = $fileProductImages;
                $image->save();
            }

            // Set Flash Message
            session()->flash('success', 'Customer Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
            // Emit event to reload datatable
            $this->emit('productCreated', $product);
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            // Flash Message
            session()->flash('error', $th->getMessage());

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
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
        // *** TODO: ***

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
