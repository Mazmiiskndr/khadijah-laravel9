<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use App\Services\Product\ProductService;
use Livewire\Component;

class DatatableProduct extends Component
{
    /**
     * Render the component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view(
            'livewire.backend.product.datatable-product',
            [
                'products' => Product::with('category')->get()
            ]
        );
    }
}
