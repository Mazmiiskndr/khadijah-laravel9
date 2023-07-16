<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class LeftNewProduct extends Component
{
    // Public properties
    public $products1, $products2;
    /**
     * Mount the component.
     * @param ProductService $productService
     */
    public function mount(ProductService $productService)
    {
        try {
            $this->products1 = $productService->getLatestProductsWithStock(1, 4);

            $this->products2 = $productService->getLatestProductsWithStock(5, 4);
        } catch (\Exception $e) {
            session()->flash('alert', 'Unable to fetch products at the moment.');
            Log::error('Error fetching products: ' . $e->getMessage());
        }
    }


    /**
     * Render View
     */
    public function render()
    {
        return view('livewire.frontend.product.left-new-product');
    }
}
