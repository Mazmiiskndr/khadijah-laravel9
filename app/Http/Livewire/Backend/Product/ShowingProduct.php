<?php

namespace App\Http\Livewire\Backend\Product;

use App\Services\Product\ProductService;
use Livewire\Component;

class ShowingProduct extends Component
{
    // Define public variable
    public $selectedShowing = 'featured';
    public $paginationData;

    // The event listener mappings for the component.
    protected $listeners = [
        'paginationData' => 'updatePaginationData',
    ];

    /**
     * Initialize the component.
     * @param \App\Services\ProductService $productService - The ProductService instance
     * @return void
     */
    public function mount(ProductService $productService)
    {
        $products = $productService->getPaginatedData(6, '', '');
        $this->paginationData = [
            'firstItem' => $products->firstItem(),
            'lastItem' => $products->lastItem(),
            'total' => $products->total()
        ];
    }

    /**
     * Update the selected showing option.
     * @param string $showing - The selected showing option
     * @return void
     */
    public function updatedSelectedShowing($showing)
    {
        // Emit 'showingProduct' event with the updated showing option
        $this->emit('showingProduct', $showing);
    }

    /**
     * Update the pagination data.
     * @param array $data - The pagination data
     * @return void
     */
    public function updatePaginationData($data)
    {
        $this->paginationData = $data;
    }

    /**
     * Render the component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        // Render the view 'livewire.backend.product.showing-product'
        return view('livewire.backend.product.showing-product');
    }

}
