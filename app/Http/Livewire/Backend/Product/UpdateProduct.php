<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Category;
use App\Models\ProductTag;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProduct extends Component
{

    use WithFileUploads;
    // UpdateModal
    public $updateModal = false;
    // Declare variable
    public   $product_name, $product_id, $material, $product_slug,
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
    public $categories, $tags = [], $tagsSelect = [];

    // Listeners
    protected $listeners = [
        'productUpdated' => '$refresh',
        'getProduct'    => 'show'
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
    }

    public function render()
    {
        return view('livewire.backend.product.update-product');
    }

    public function show($product)
    {
        // Update Modal True
        $this->updateModal = true;
        $sizes = explode(', ', $product['size']);
        $this->size = $sizes;

        $this->productImages = $product['images'];
        $this->product_name = $product['product_name'];
        $this->material = $product['material'];
        $this->category_id = $product['category_id'];

        // *** TODO: TAG ID ***
        $this->tag_id = array_column($product['tags'], 'tag_id');
        // set value for Tag dropdown
        // if (!is_null($product['category_id'])) {
        //     $this->product_id = $product['product_id'];
        //     $this->tags = ProductTag::where('product_id', $this->product_id)->get();
        // }

        $this->price = $product['price'];
        $this->discount = $product['discount'];
        $this->dimension = $product['dimension'];
        $this->type = $product['type'];
        $this->color = $product['color'];
        $this->weight = $product['weight'];
        $this->stock = $product['stock'];
        $this->product_description = $product['product_description'];
        $this->thumbnail = $product['thumbnail'];
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->updateModal = false;
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
