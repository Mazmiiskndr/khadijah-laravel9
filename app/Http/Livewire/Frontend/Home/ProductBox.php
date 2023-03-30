<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Cart;
use App\Models\Product;
use App\Services\Cart\CartService;
use App\Services\Product\ProductService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductBox extends Component
{
    public $cart_uid, $product_uid,$customer_id,$product_id,$quantity;
    public function render(ProductService $productService)
    {
        return view('livewire.frontend.home.product-box', [
            'products' => $productService->getLimitData(5),
        ]);
    }


    /**
     * addToCart
     *
     * @param  mixed $cartService
     * @param  mixed $uid
     */
    public function addToCart(CartService $cartService, $uid)
    {
        $customer = Auth::guard('customer')->user();
        $cart = $cartService->addProductToCart($uid, $customer->id);
        if (!empty($cart)) {
            $this->emit('homeCartCreated', $cart);
            $this->dispatchBrowserEvent('success-cart');
        }
    }
}
