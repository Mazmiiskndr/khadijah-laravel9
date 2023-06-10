<?php

namespace App\Http\Livewire\Backend\Product;

use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithPagination;
class GalleryProduct extends Component
{
    // Use Pagination
    use WithPagination;
    // Define public variable
    public $perPage = 8;
    public $paginationTheme = 'bootstrap';
    public $search = '';
    // The event listener mappings for the component.
    protected $listeners = [
        'searchProduct' => 'updateSearch',
    ];

    /**
     * Reset the pagination page when the search query is being updated.
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Update the search query with the provided keyword.
     * @param string $keyword - The search keyword
     * @return void
     */
    public function updateSearch($keyword)
    {
        $this->search = $keyword;
    }

    /**
     * Render the component.
     * @param ProductService $productService - The ProductService instance
     * @return \Illuminate\Contracts\View\View
     */
    public function render(ProductService $productService)
    {
        // Get paginated gallery products using ProductService
        $products = $productService->getGalleryProduct($this->perPage, $this->search);

        // Render the view 'livewire.backend.product.gallery-product' with products data
        return view('livewire.backend.product.gallery-product', ['products' => $products]);
    }

}
