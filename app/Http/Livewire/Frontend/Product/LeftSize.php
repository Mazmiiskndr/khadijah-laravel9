<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class LeftSize extends Component
{
    // *** TODO: ***
    public $sizes = [
        'S',
        'M',
        'L',
        'XL',
        'XXL',
        'XXXL',
        'Super Jumbo',
    ];

    public $selected;

    public function mount()
    {
        $this->selected = $this->sizes;
    }

    public function render()
    {
        return view('livewire.frontend.product.left-size');
    }
}
