<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithPagination;

class Grid extends Component
{
    use WithPagination;
    public $perPage = 16;
    public $paginationTheme = 'bootstrap';
    public $search = '';
    public $showing = '';
    public $product_id;
    public $currentPage;
    public $categoryFilters = [];
    protected $listeners = [
        'productDeleted'        => 'handleDeleted',
        'searchProduct'         => 'updateSearch',
        'showingProduct'        => 'updateShowing',
        'categorySelected'      => 'updateCategorySelected',
        'deleteConfirmation'    => 'destroy',
        'productCreated'        => 'handleStored',
        'updatedProduct'        => 'handleUpdated',
    ];

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->categoryFilters = request()->input('categoryFilters', []) ?? [];
    }
    public function updateShowing($showing)
    {
        $this->showing = $showing;
    }

    /**
     * render
     *
     * @param  mixed $productService
     */
    public function render(ProductService $productService)
    {
        $products = $productService->getPaginatedData($this->perPage, $this->search, $this->showing, $this->categoryFilters);

        if (is_object($products)) {
            $paginationData = [
                'firstItem' => $products->firstItem(),
                'lastItem' => $products->lastItem(),
                'total' => $products->total()
            ];
        } else {
            $paginationData = [
                'firstItem' => 0,
                'lastItem' => 0,
                'total' => 0
            ];
        }

        return view('livewire.frontend.product.grid', [
            'products' => $products,
            'paginationData' => $paginationData,
        ]);
    }

    /**
     * updatingSearch
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * updateSearch
     *
     * @param  mixed $keyword
     * @return void
     */
    public function updateSearch($keyword)
    {
        $this->search = $keyword;
    }


}
