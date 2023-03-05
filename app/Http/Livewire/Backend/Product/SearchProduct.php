<?php

namespace App\Http\Livewire\Backend\Product;

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
        return view('livewire.backend.product.search-product');
    }
}
