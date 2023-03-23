<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Services\Product\ProductService;
use Livewire\Component;

class ProductBox extends Component
{

    public function render(ProductService $productService)
    {
        return view('livewire.frontend.home.product-box', [
            'products' => $productService->getLimitData(5),
        ]);
    }
}
