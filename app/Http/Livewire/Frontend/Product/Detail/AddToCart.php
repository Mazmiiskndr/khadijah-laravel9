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
    public function addToCart(CartService $cartService,$productUid)
    {
        $customer = Auth::guard('customer')->user();
        if ($customer == null) {
            return redirect()->route('customer.login')->with('error', 'Anda Belum Login. Silahkan Login!');
        }
        $this->validate();
        $data = [
            'size' => $this->selectedSize,
            'color' => $this->selectedColor,
            'quantity' => $this->quantity,
        ];
        $cart = $cartService->addProductToCart($productUid, $customer->id, $data);
        if (!empty($cart)) {
            session()->flash('success', 'Produk Berhasil di Tambahkan ke Keranjang!');
            $this->resetVars();
            $this->emit('detailCartCreated', $cart);
            $this->dispatchBrowserEvent('success-cart');
        }
    }

    public function resetVars()
    {
        $this->selectedColor = '';
        $this->selectedSize = '';
        $this->quantity = 1;
    }
}
