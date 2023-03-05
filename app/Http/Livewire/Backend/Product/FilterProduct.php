<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Services\Category\CategoryService;

class FilterProduct extends Component
{

    public function render(CategoryService $categoryService)
    {
        return view('livewire.backend.product.filter-product', [
            'categories' => $categoryService->getAllData(),
        ]);
    }
}
