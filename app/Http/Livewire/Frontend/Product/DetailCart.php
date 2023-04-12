<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailCart extends Component
{
    // ShowModal
    public $showModal = false;
    // Declare variable
    public   $product_name, $product_id, $product_slug,
            $price, $discount,
            $color,$stock,
            $product_description,
            $thumbnail;
    public $tag_id = [];
    public $colors = [];
    public $size = [];

    // Declare Categories and Tags
    public $categories, $tags = [], $tagsSelect = [], $colorsSelect = [];
    public $productColors, $productSize, $selectedColor, $selectedSize, $quantity = 1, $productUid;
    protected $listeners = [
        'openModalProduct'          => 'show',
        'productSelectedColor'      => 'onProductSelectedColor',
        'productSelectedSize'       => 'onProductSelectedSize',
        'productSelectedQuantity'   => 'onProductSelectedQuantity',
    ];

    protected $rules = [
        'selectedSize' => 'required',
        'selectedColor' => 'required',
    ];
    protected $messages = [
        'selectedSize.required' => 'Ukuran harus dipilih!',
        'selectedColor.required' => 'Ukuran harus dipilih!',
    ];


    /**
     * render
     */
    public function render()
    {
        return view('livewire.frontend.product.detail-cart');
    }

    /**
     * show
     *
     * @param  mixed $product
     * @return void
     */
    public function show($product)
    {
        // Update Modal True
        $this->showModal          = true;

        // Explode Size to Array []
        $sizes                      = explode(', ', $product['size']);
        $this->size                 = $sizes;

        // Explode Colors to Array []
        $colors                      = explode(', ', $product['color']);
        $this->colors                 = $colors;

        // Declare Variable
        $this->product_id           = $product['product_id'];
        $this->productUid           = $product['product_uid'];
        $this->product_name         = $product['product_name'];
        $this->product_slug         = $product['product_slug'];
        $this->thumbnail            = $product['thumbnail'];
        $this->price                = $product['price'];
        $this->discount             = $product['discount'];
        $this->stock              = $product['stock'];
        $this->product_description  = $product['product_description'];
    }


    /**
     * resetVars
     *
     * @return void
     */
    public function resetVars()
    {
        $this->showModal = false;
        $this->product_name = '';
        $this->product_slug = '';
        $this->price = null;
        $this->discount = null;
        $this->color = [];
        $this->stock = null;
        $this->product_description = '';
        $this->thumbnail = '';
        $this->colors = [];
        $this->size = [];
        $this->selectedColor = '';
        $this->selectedSize = '';
        $this->quantity = 1;
    }

    /**
     * onProductSelectedColor
     *
     * @param  mixed $color
     * @return void
     */
    public function onProductSelectedColor($color)
    {
        $this->selectedColor = $color;
    }

    /**
     * onProductSelectedSize
     *
     * @param  mixed $size
     * @return void
     */
    public function onProductSelectedSize($size)
    {
        $this->selectedSize = $size;
    }

    /**
     * addToCart
     *
     * @param  mixed $cartService
     * @param  mixed $uid
     * @return void
     */
    public function addToCart(CartService $cartService, $uid)
    {
        // Getting the authenticated customer
        $customer = Auth::guard('customer')->user();
        // Checking if the customer is not logged in
        if ($customer == null) {
            // Redirecting to the login page with an error message
            return redirect()->route('customer.login')->with('error', 'Anda Belum Login. Silahkan Login!');
        }
        // Validating the form data
        $this->validate();
        // Preparing the data to be added to the cart
        $data = [
            'size' => $this->selectedSize,
            'color' => $this->selectedColor,
            'quantity' => $this->quantity,
        ];

        // Adding the product to the cart using the CartService
        $cart = $cartService->addProductToCart($uid, $customer->id, $data);
        // Checking if the product was added to the cart
        if (!empty($cart)) {
            // Displaying a success message
            session()->flash('success', 'Produk Berhasil di Tambahkan ke Keranjang!');
            // Resetting the component variables
            $this->resetVars();
            // Emitting an event to update the cart count
            $this->emit('productCartCreated', $cart);
            // Dispatching a browser event to display the success message
            $this->dispatchBrowserEvent('success-cart');
            // Dispatching a browser event to close the product modal
            $this->dispatchBrowserEvent('close-modal-product');
        }
    }

}
