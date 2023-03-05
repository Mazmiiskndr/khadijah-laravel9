<?php

namespace App\Http\Livewire\Backend\Product;

use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithPagination;

class CardProduct extends Component
{
    use WithPagination;

    public $perPage = 6;
    public $paginationTheme = 'bootstrap';
    public $search = '';

    protected $listeners = [
        'searchProduct' => 'updateSearch'
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateSearch($keyword)
    {
        $this->search = $keyword;
    }

    public function render(ProductService $productService)
    {
        $products = $productService->getPaginatedData($this->perPage, $this->search);

        return view('livewire.backend.product.card-product', ['products' => $products]);
    }
}
