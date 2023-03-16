<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
    public $colors = [];
    public $size = [];

    // Declare Categories and Tags
    public $categories, $tags = [], $tagsSelect = [], $colorsSelect = [];

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
        $this->colors       = Color::orderBy('color_name', 'ASC')->get();
    }

    // Validation Fields
    protected function getRules()
    {
        $rules = [
            // Required
            'product_name'          => 'required',
            'category_id'           => 'required',
            'price'                 => 'required',
            'size'                  => 'required',
            'stock'                 => 'required',
        ];

        // Add thumbnail validation rule if it's uploaded
        if ($this->thumbnail) {
            $rules['thumbnail'] = 'nullable|image|max:5120';
        }
        $rules['productImages.*'] = 'nullable|image|max:20480';


        // Add nullable validation rule for optional fields
        $rules += [
            'color'                 => 'nullable',
            'type'                  => 'nullable',
            'product_description'   => 'nullable',
            'weight'                => 'nullable',
            'material'              => 'nullable',
            'dimension'             => 'nullable',
            'discount'              => 'nullable',
        ];

        return $rules;
    }

    // Validation Messages
    protected function getMessages()
    {
        $messages = [
            'product_name.required' => 'Nama Produk harus diisi',
            'category_id.required'  => 'Kategori harus diisi',
            'price.required'        => 'Harga harus diisi',
            'size.required'         => 'Ukuran harus diisi',
            'stock.required'        => 'Stok harus diisi',
        ];

        // Add thumbnail validation message if it's uploaded
        if ($this->thumbnail) {
            $messages['thumbnail.max']      = 'Ukuran gambar maksimal 5mb';
            $messages['thumbnail.image']    = 'Format harus berupa gambar';
        }

        // Add product images validation message if there are any uploaded
        $messages['productImages.*.max']    = 'Ukuran gambar maksimal 20mb';
        $messages['productImages.*.image']  = 'Format harus berupa gambar';


        return $messages;
    }

    public function render()
    {
        return view('livewire.backend.product.update-product');
    }

    public function show($product)
    {
        // Update Modal True
        $this->updateModal          = true;
        // Explode Size to Array []
        $sizes                      = explode(', ', $product['size']);
        $this->size                 = $sizes;

        // Explode Colors to Array []
        $colors                      = explode(', ', $product['color']);
        $this->color                 = $colors;

        // Set value for Tag dropdown
        $this->tag_id               = array_column($product['tags'], 'tag_id');

        // Declare Variable
        $this->product_id           = $product['product_id'];
        $this->product_name         = $product['product_name'];
        $this->material             = $product['material'];
        $this->category_id          = $product['category_id'];
        $this->price                = $product['price'];
        $this->discount             = $product['discount'];
        $this->dimension            = $product['dimension'];
        $this->type                 = $product['type'];
        $this->weight               = $product['weight'];
        $this->stock                = $product['stock'];
        $this->product_description  = $product['product_description'];
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        // Create Validate
        $this->validate($this->getRules(), $this->getMessages());

        if ($this->product_id) {
            $product = Product::find($this->product_id);
            $productData = [];
            // Check if thumbnail is uploaded
            if ($this->thumbnail) {
                // Update Thumbnail
                $fileName = $this->thumbnail->store('assets/images/products', 'public');
                // Delete previous thumbnail if exists
                if ($product->thumbnail) {
                    Storage::delete('public/' . $product->thumbnail);
                }
                $productData = [
                    'thumbnail' => $fileName,
                ];
            }

            // Check if product images are uploaded
            if (count($this->productImages)) {
                // Delete previous product images if exists
                $product->images()->delete();
                foreach ($this->productImages as $productImage) {
                    // Store new product image
                    $fileName = $productImage->store('assets/images/product_images', 'public');
                    // Create new product image record in database
                    $product->images()->create([
                        'image_name' => $fileName,
                    ]);
                }
            }

            /// Remove existing tags
            $product->tags()->detach();

            // Add new tags
            $tags = $this->tag_id;
            // dd($tags);
            foreach ($tags as $tag) {
                $product->tags()->attach($tag);
            }

            // Update other product fields
            // Implode Array Size
            $size = implode(', ', $this->size);
            // Implode Array Color
            $color = implode(', ', $this->color);
            // DateNow for Updated
            $dateNow = Carbon::now()->format('Y-m-d h:i:s');
            // Declare Product Data
            $productData += [
                'product_name'          => $this->product_name,
                'product_slug'          => str()->slug($this->product_name),
                'category_id'           => $this->category_id,
                'price'                 => $this->price,
                'size'                  => $size,
                'color'                 => $color,
                'stock'                 => $this->stock,
                'type'                  => $this->type,
                'product_description'   => $this->product_description,
                'weight'                => $this->weight,
                'material'              => $this->material,
                'dimension'             => $this->dimension,
                'discount'              => $this->discount,
                'date_updated'          => $dateNow,
            ];
            // Update Product
            $product->update($productData);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Produk Berhasil di Update!');
            $this->resetFields();
            // buatkan emit dengan flash message
            $this->emit('updatedProduct', $product);
            $this->dispatchBrowserEvent('close-modal-update');
        }
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
