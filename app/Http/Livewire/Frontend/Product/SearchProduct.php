<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class SearchProduct extends Component
{
    public $keyword;

    public function updatedKeyword($keyword)
    {
        $this->emit('searchProduct', $keyword);
    }

    public function render()
    {
        return view('livewire.frontend.product.search-product');
    }
}
