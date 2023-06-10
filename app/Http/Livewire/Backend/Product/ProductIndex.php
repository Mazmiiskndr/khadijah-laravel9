<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;

class ProductIndex extends Component
{
    /**
     * Render the component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.backend.product.product-index');
    }
}
