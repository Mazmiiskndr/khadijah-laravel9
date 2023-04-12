<?php

namespace App\Http\Livewire\Frontend\Product\Detail;

use App\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductLimitDetailCart extends Component
{
    // ShowModal
    public $showModal = false;
    // Declare variable
    public   $product_name, $product_id, $product_slug,
        $price, $discount,
        $color, $stock,
        $product_description,
        $thumbnail;
    public $tag_id = [];
    public $colors = [];
    public $size = [];

    // Declare Categories and Tags
    public $categories, $tags = [], $tagsSelect = [], $colorsSelect = [];
    public $productColors, $productSize, $selectedColor, $selectedSize, $quantity = 1, $productUid;
    protected $listeners = [
        'openModalProductDetail'    => 'showDetail',
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

    public function render()
    {
        return view('livewire.frontend.product.detail.product-limit-detail-cart');
    }

    /**
     * showDetail
     *
     * @param  mixed $product
     * @return void
     */
    public function showDetail($product)
    {
        // Update Modal True
        $this->showModal          = true;
        // Explode Size to Array []
        $sizes                      = explode(', ', $product['size']);
        $this->size                 = $sizes;

        // Explode Colors to Array []
        $colors                      = explode(', ', $product['color']);
        $this->colors                 = $colors;

        // Set value for Tag dropdown
        // $this->tag_id               = array_column($product['tags'], 'tag_id');

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

    public function onProductSelectedColor($color)
    {
        $this->selectedColor = $color;
    }

    public function onProductSelectedSize($size)
    {
        $this->selectedSize = $size;
    }

    public function addToCart(CartService $cartService, $uid)
    {
        $customer = Auth::guard('customer')->user();
        if ($customer == null
        ) {
            return redirect()->route('customer.login')->with('error', 'Anda Belum Login. Silahkan Login!');
        }
        $this->validate();
        $data = [
            'size' => $this->selectedSize,
            'color' => $this->selectedColor,
            'quantity' => $this->quantity,
        ];
        // dd($data);
        $cart = $cartService->addProductToCart($uid, $customer->id, $data);
        if (!empty($cart)) {
            session()->flash('success', 'Produk Berhasil di Tambahkan ke Keranjang!');
            $this->resetVars();
            $this->emit('productCartCreated', $cart);
            $this->dispatchBrowserEvent('success-cart');
            $this->dispatchBrowserEvent('close-modal-product');
        }
    }
}
