<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class ProductFilter extends Component
{

    public $selectedShowing = 'featured';
    public function updatedSelectedShowing($showing)
    {
        $this->emit('showingProduct', $showing);
    }


    public function render()
    {
        return view('livewire.frontend.product.product-filter');
    }
}
