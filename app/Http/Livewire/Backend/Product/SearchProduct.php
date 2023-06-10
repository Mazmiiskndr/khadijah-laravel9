<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;

class SearchProduct extends Component
{
    // Define public variable
    public $keyword;

    /**
     * Update the keyword when it is being updated.
     * @param string $keyword - The updated keyword
     * @return void
     */
    public function updatedKeyword($keyword)
    {
        // Emit 'searchProduct' event with the updated keyword
        $this->emit('searchProduct', $keyword);
    }

    /**
     * Render the component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        // Render the view 'livewire.backend.product.search-product'
        return view('livewire.backend.product.search-product');
    }

}
