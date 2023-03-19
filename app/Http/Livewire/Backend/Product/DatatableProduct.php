<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use App\Services\Product\ProductService;
use Livewire\Component;

class DatatableProduct extends Component
{
    public function render(ProductService $productService)
    {
        return view(
            'livewire.backend.product.datatable-product',
            [
                'products' => Product::with('category')->get()
            ]
        );
    }
}
