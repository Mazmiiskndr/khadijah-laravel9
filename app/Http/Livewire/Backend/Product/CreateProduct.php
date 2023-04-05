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

            // Reset Form Fields After Creating Product
            $this->resetFields();
            // Emit event to reload datatable
            $this->emit('productCreated', $createdProduct);
            $this->dispatchBrowserEvent('close-modal');
        } else {
            // Flash Message
            session()->flash('error', $createdProduct);

            // Reset Form Fields After Creating Product
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
        $this->tag_id               = [];
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
