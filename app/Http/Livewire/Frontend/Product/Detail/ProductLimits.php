<?php

namespace App\Http\Livewire\Frontend\Product\Detail;

use App\Models\Product;
use App\Services\Product\ProductService;
use Livewire\Component;

class ProductLimits extends Component
{
    public function render()
    {
        $productLimits = Product::with('images')->orderBy('created_at', 'DESC')->offset(9 - 1)->limit(6)->get();
        return view('livewire.frontend.product.detail.product-limits',[
            'productLimits' => $productLimits,
        ]);
    }

    public function openModal(ProductService $productService, $productUid)
    {
        $product = $productService->getProductByUid($productUid);
        $this->emit('openModalProductDetail', $product);
    }
}
