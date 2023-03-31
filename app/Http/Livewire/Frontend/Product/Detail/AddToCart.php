<?php

namespace App\Http\Livewire\Frontend\Product\Detail;

use App\Http\Livewire\Frontend\Header\Cart;
use App\Models\Product;
use App\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{
    public $productColors, $productSize, $selectedColor, $selectedSize, $quantity = 1, $productUid;

    protected $listeners = [
        'productSelectedColor' => 'onProductSelectedColor',
        'productSelectedSize' => 'onProductSelectedSize',
        'productSelectedQuantity' => 'onProductSelectedQuantity',
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
        $colors = explode(', ', $this->productColors);
        $sizes = explode(', ', $this->productSize);
        return view('livewire.frontend.product.detail.add-to-cart', [
            'sizes' => $sizes,
            'colors' => $colors,
            'productUid' => $this->productUid,
            'selectedColor' => $this->selectedColor,
            'selectedSize' => $this->selectedSize,
            'quantity' => $this->quantity,
        ]);
    }

    public function onProductSelectedColor($color)
    {
        $this->selectedColor = $color;
    }

    public function onProductSelectedSize($size)
    {
        $this->selectedSize = $size;
    }
    // TODO:
    public function addToCart($productUid)
    {
        $this->validate();
        $data = [
            'product_uid' => $productUid,
            'color' => $this->selectedColor,
            'size' => $this->selectedSize,
            'quantity' => $this->quantity,
        ];
        $customer = Auth::guard('customer')->user();
        // Get product by uid
        $product = Product::where('product_uid', $productUid)->first();

        // Check if product is not empty
        if (!empty($product)) {
            $productId = $product->product_id;
            $quantity = $this->quantity;
            // Create new cart
            // *** TODO: *** Add Cart Table Color and Size
            dd('TODO: Add Cart Table Color and Size');
            $cart = Cart::create([
                'product_id' => $productId,
                'customer_id' => $customer->id,
                'quantity' => $quantity,
                'product_uid' => $productUid,
                'color' => $this->selectedColor,
                'size' => $this->selectedSize,
            ]);
            // Success
            $this->emit('productCartCreated', $cart);
            session()->flash('success', 'Produk berhasil di tambahkan!');
            $this->dispatchBrowserEvent('success-add-to-cart');

        }
    }
}
