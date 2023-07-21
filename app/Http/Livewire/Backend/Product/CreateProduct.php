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
    // Declare variables
    public $product_name, $material, $category_id, $price, $discount, $color, $type, $weight, $stock, $product_description, $thumbnail;
    public $productImages = [], $tag_id = [], $colors = [], $size = [], $length, $width, $height;
    public $categories = [], $tags = [];

    // Modal state
    public $createModal = false;

    // Listeners
    protected $listeners = ['productCreated' => '$refresh', 'tagIdSelected' => 'tagSelected'];

    // Validation rules
    protected $rules = [
        'product_name' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'size' => 'required',
        'stock' => 'required',
        'thumbnail' => 'required|image|max:5120',
        'productImages.*' => 'image|max:20480',
        'weight' => 'required',
        'color' => 'required',
        'product_description' => 'nullable',
        'length' => 'required',
        'width' => 'required',
        'height' => 'required',
        'type' => 'nullable',
        'material' => 'nullable',
        'discount' => 'nullable'
    ];

    // Validation messages
    protected $messages = [
        'product_name.required' => 'Nama Produk harus diisi',
        'category_id.required' => 'Kategori harus diisi',
        'price.required' => 'Harga harus diisi',
        'size.required' => 'Ukuran harus diisi',
        'stock.required' => 'Stok harus diisi',
        'weight.required' => 'Berat harus diisi',
        'color.required' => 'Warna harus diisi',
        'length.required' => 'Panjang harus diisi',
        'width.required' => 'Lebar harus diisi',
        'height.required' => 'Tinggi harus diisi',
        'thumbnail.required' => 'Thumbnail harus diisi',
        'thumbnail.max' => 'Ukuran gambar maksimal 5mb',
        'productImages.*.max' => 'Ukuran gambar maksimal 20mb',
        'thumbnail.image' => 'Format harus berupa gambar',
        'productImages.*.image' => 'Format harus berupa gambar',
    ];

    /**
     * Run every time a property changes and validate the changed property.
     * @param string $property
     */
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    /**
     * Run when component is first added to the DOM.
     */
    public function mount()
    {
        // Reset fields
        $this->resetFields();
        // Get all categories and tags
        $this->categories = Category::orderBy('created_at', 'DESC')->get();
        $this->tags = Tag::orderBy('created_at', 'DESC')->get();
        $this->colors = Color::orderBy('color_name', 'ASC')->get();
    }

    /**
     * Render the view for the component.
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.backend.product.create-product');
    }

    /**
     * Submit the form and create a new product using the ProductService.
     * @param ProductService $productService
     * @return void
     * @throws \Throwable
     */
    public function submit(ProductService $productService)
    {
        // Perform validation based on the defined rules
        $this->validate();
        try {

            // Create the product using ProductService
            $createdProduct = $productService->createProduct($this);

            // Check if the created product is an instance of Product
            if ($createdProduct instanceof Product) {
                // Set flash message indicating successful creation
                session()->flash('success', 'Produk Berhasil di Tambahkan!');

                // Reset the input fields
                $this->resetFields();

                // Emit 'productCreated' event with the created product
                $this->emit('productCreated', $createdProduct);

                // Dispatch browser event to close the modal
                $this->dispatchBrowserEvent('close-modal');
            } else {
                // Set flash message indicating an error occurred
                session()->flash('error', $createdProduct);

                // Reset the input fields
                $this->resetFields();
            }
        } catch (\Throwable $th) {
            // Handle the exception and display error message
            session()->flash('error', 'Terjadi kesalahan saat menambahkan produk: ' . $th->getMessage());

            // Reset the input fields
            $this->resetFields();
        }

    }

    /**
     * Close the modal.
     */
    public function closeModal()
    {
        $this->createModal = false;
        $this->resetFields();
        // Reset the validation error messages
        $this->resetErrorBag();
        // Reset the validation status
        $this->resetValidation();
    }

    /**
     * Reset form fields.
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
        $this->dispatchBrowserEvent('fileInputReset');
    }
}
