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
    public $cart_uid, $product_uid, $customer_id, $product_id, $quantity;
    public function render(ProductService $productService)
    {
        return view('livewire.frontend.home.product-box', [
            'products' => $productService->getLimitData(5),
        ]);
    }


    public function openModal(ProductService $productService, $productUid)
    {
        $product = $productService->getProductByUid($productUid);
        $this->emit('openModalProduct', $product);
    }

}
