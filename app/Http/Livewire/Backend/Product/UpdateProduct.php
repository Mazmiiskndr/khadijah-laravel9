<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProduct extends Component
{

    use WithFileUploads;
    // UpdateModal
    public $updateModal = false;

    // Declare variables
    public $product_name, $product_id, $material, $product_slug, $category_id, $price, $discount, $length, $width, $height,
        $color, $type, $weight, $stock, $product_description, $thumbnail, $productImages = [];
    public $tag_id = [];
    public $colors = [];
    public $size = [];
    public $categories, $tags = [], $tagsSelect = [], $colorsSelect = [];

    // Listeners
    protected $listeners = [
        'productUpdated' => '$refresh',
        'getProduct' => 'show'
    ];

    /**
     * Event fired after a property is updated.
     * @param  string $property
     * @return void
     */
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    /**
     * Event fired when the component is initialized.
     * @return void
     */
    public function mount()
    {
        $this->resetFields();
        $this->categories = Category::orderBy('created_at', 'DESC')->get();
        $this->tags = Tag::orderBy('created_at', 'DESC')->get();
        $this->colors = Color::orderBy('color_name', 'ASC')->get();
    }

    /**
     * Returns validation rules for the properties.
     * @return array
     */
    protected function getRules()
    {
        $rules = [
            'product_name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'size' => 'required',
            'stock' => 'required',
            'weight' => 'required',
        ];

        if ($this->thumbnail) {
            $rules['thumbnail'] = 'nullable|image|max:5120';
        }
        $rules['productImages.*'] = 'nullable|image|max:20480';

        $rules += [
            'color' => 'nullable',
            'type' => 'nullable',
            'product_description' => 'nullable',
            'material' => 'nullable',
            'discount' => 'nullable',
            'length' => 'nullable',
            'width' => 'nullable',
            'height' => 'nullable',
        ];

        return $rules;
    }

    /**
     * Returns validation messages for the properties.
     * @return array
     */
    protected function getMessages()
    {
        $messages = [
            'product_name.required' => 'Nama Produk harus diisi',
            'category_id.required' => 'Kategori harus diisi',
            'price.required' => 'Harga harus diisi',
            'size.required' => 'Ukuran harus diisi',
            'stock.required' => 'Stok harus diisi',
            'weight.required' => 'Berat harus diisi',
        ];

        if ($this->thumbnail) {
            $messages['thumbnail.max'] = 'Ukuran gambar maksimal 5mb';
            $messages['thumbnail.image'] = 'Format harus berupa gambar';
        }

        $messages['productImages.*.max'] = 'Ukuran gambar maksimal 20mb';
        $messages['productImages.*.image'] = 'Format harus berupa gambar';

        return $messages;
    }

    /**
     * Render the product update view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.backend.product.update-product');
    }

    /**
     * Show the details of a product.
     * @param  Product $product
     * @return void
     */
    public function show($product)
    {
        $this->updateModal = true;
        $sizes = explode(', ', $product['size']);
        $this->size = $sizes;
        $colors = explode(', ', $product['color']);
        $this->color = $colors;
        $this->tag_id = array_column($product['tags'], 'tag_id');
        list($this->length, $this->width, $this->height) = explode(' x ', $product['dimension']);
        $this->product_id = $product['product_id'];
        $this->product_name = $product['product_name'];
        $this->material = $product['material'];
        $this->category_id = $product['category_id'];
        $this->price = $product['price'];
        $this->discount = $product['discount'];
        $this->type = $product['type'];
        $this->weight = $product['weight'];
        $this->stock = $product['stock'];
        $this->product_description = $product['product_description'];
    }

    /**
     * Update a product.
     * @param  ProductService $productService
     * @return void
     */
    public function update(ProductService $productService)
    {
        try {
            // Validate the request
            $this->validate($this->getRules(), $this->getMessages());

            if ($this->product_id) {
                // Update the product
                $updatedProduct = $productService->updateProduct($this->product_id, $this);
                if ($updatedProduct) {
                    $this->updateModal = false;
                    session()->flash('success', 'Produk Berhasil di Update!');
                    $this->resetFields();
                    $this->emit('updatedProduct', $updatedProduct);
                    $this->dispatchBrowserEvent('close-modal-update');
                }
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan! '.$e->getMessage());
        }
    }


    /**
     * Close the update modal.
     * @return void
     */
    public function closeModal()
    {
        $this->updateModal = false;
        $this->resetFields();
    }

    /**
     * Reset all fields.
     * @return void
     */
    public function resetFields()
    {
        $this->tag_id = [];
        $this->product_name = '';
        $this->productImages = [];
        $this->category_id = '';
        $this->price = '';
        $this->size = '';
        $this->stock = '';
        $this->thumbnail = null;
        $this->color = '';
        $this->type = '';
        $this->product_description = '';
        $this->weight = '';
        $this->material = '';
        $this->length = '';
        $this->width = '';
        $this->height = '';
        $this->discount = '';
    }

}
