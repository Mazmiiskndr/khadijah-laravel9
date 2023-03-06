<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;

class FilterProduct extends Component
{

    public $products;

    public function mount(ProductService $productService)
    {
        $this->products = $productService->getLimitData(3);
    }

    public function render(CategoryService $categoryService)
    {
        return view('livewire.backend.product.filter-product', [
            'categories' => $categoryService->getLimitData(5),
            'products' => $this->products,
        ]);
    }
}
