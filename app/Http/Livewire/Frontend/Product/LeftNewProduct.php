<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class LeftNewProduct extends Component
{


    /**
     * Render View
     */
    public function render()
    {
        $products1 = Product::with('images')->orderBy('created_at', 'DESC')->offset(1 - 1)->limit(4)->get();
        $products2 = Product::with('images')->orderBy('created_at', 'DESC')->offset(5 - 1)->limit(4)->get();
        return view('livewire.frontend.product.left-new-product', [
            'products1' => $products1,
            'products2' => $products2,
        ]);
    }
}
