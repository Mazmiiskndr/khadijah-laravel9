<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Services\Category\CategoryService;
use Livewire\Component;

class LeftCategory extends Component
{

    public function render(CategoryService $categoryService)
    {
        return view('livewire.frontend.product.left-category', [
            'categories' => $categoryService->getLimitData(5),
        ]);
    }
}
