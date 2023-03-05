<?php

namespace App\Http\Livewire\Backend\Product;

use App\Services\Product\ProductService;
use Livewire\Component;

class ShowingProduct extends Component
{
    public $selectedShowing = 'featured';
    public $paginationData;
    protected $listeners = [
        'paginationData' => 'updatePaginationData',
    ];

    public function mount(ProductService $productService)
    {
        $products = $productService->getPaginatedData(6, '', '');
        $this->paginationData = [
            'firstItem' => $products->firstItem(),
            'lastItem' => $products->lastItem(),
            'total' => $products->total()
        ];
    }
    public function updatedSelectedShowing($showing)
    {
        $this->emit('showingProduct', $showing);
    }

    public function updatePaginationData($data)
    {
        $this->paginationData = $data;
    }

    public function render()
    {
        return view('livewire.backend.product.showing-product');
    }
}
