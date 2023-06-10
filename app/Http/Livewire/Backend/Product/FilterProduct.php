<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;

class FilterProduct extends Component
{

    // Define public variable
    public $products;

    /**
     * Mount the component and initialize the $products property with limited product data.
     * @param ProductService $productService - The ProductService instance
     * @return void
     */
    public function mount(ProductService $productService)
    {
        // Get limited product data using ProductService
        $this->products = $productService->getLimitData(3);
    }

    /**
     * Render the component.
     * @param CategoryService $categoryService - The CategoryService instance
     * @return \Illuminate\Contracts\View\View
     */
    public function render(CategoryService $categoryService)
    {
        // Render the view 'livewire.backend.product.filter-product' with categories and products data
        return view('livewire.backend.product.filter-product', [
            'categories' => $categoryService->getLimitData(5),
            'products' => $this->products,
        ]);
    }

}
