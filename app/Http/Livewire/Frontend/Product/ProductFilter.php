<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Services\Product\ProductService;
use Livewire\Component;

class ProductFilter extends Component
{

    public $selectedShowing = 'featured';
    // Declare Variable For Add to Cart
    public $perPage = 16;
    public $paginationTheme = 'bootstrap';
    public $search = '';
    public $sizes = [];
    public $showing = '';
    public $categoryFilters = [];
    public function updatedSelectedShowing($showing)
    {
        $this->emit('showingProduct', $showing);
    }
    public function render(ProductService $productService)
    {
        $products = $productService->getProductFrontend($this->perPage, $this->search, $this->showing, $this->categoryFilters, $this->sizes);

        if (is_object($products)) {
            $paginationData = [
                'firstItem' => $products->firstItem(),
                'lastItem' => $products->lastItem(),
                'total' => $products->total()
            ];
        } else {
            $paginationData = [
                'firstItem' => 0,
                'lastItem' => 0,
                'total' => 0
            ];
        }

        return view('livewire.frontend.product.product-filter', [
            'products' => $products,
            'paginationData' => $paginationData,
        ]);
    }


}
