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
    public $showing = '';

    protected $listeners = [
        'searchProduct' => 'updateSearch',
        'showingProduct' => 'updateShowing',
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateSearch($keyword)
    {
        $this->search = $keyword;
    }
    public function updateShowing($showing)
    {
        $this->showing = $showing;
    }

    public function render(ProductService $productService)
    {
        $products = $productService->getPaginatedData($this->perPage, $this->search, $this->showing);
        $paginationData = [
            'firstItem' => $products->firstItem(),
            'lastItem' => $products->lastItem(),
            'total' => $products->total()
        ];
        $this->emit('paginationData', $paginationData);
        return view('livewire.backend.product.card-product', ['products' => $products]);
    }
}
