<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Product;
use App\Services\Cart\CartService;
use App\Services\Product\ProductService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Grid extends Component
{
    use WithPagination;
    // Declare Variable For Add to Cart
    public $customer_id,$quantity,$productIdCart;
    public $selectedProduct = [];
    public $perPage = 16;
    public $paginationTheme = 'bootstrap';
    public $search = '';
    public $sizes = [];
    public $showing = '';
    public $product_id;
    public $currentPage;
    public $categoryFilters = [];
    protected $listeners = [
        'productDeleted'        => 'handleDeleted',
        'searchProduct'         => 'updateSearch',
        'showingProduct'        => 'updateShowing',
        'categorySelected'      => 'updateCategorySelected',
        'sizeSelected'          => 'updateSizeSelected',
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
        $this->sizes = request()->input('sizes', []) ?? [];
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
        // Retrieving the products based on the provided filters
        $products = $productService->getProductFrontend($this->perPage, $this->search, $this->showing, $this->categoryFilters, $this->sizes);

        // Calculate average rating for each product
        foreach ($products as $product) {
            $product->averageRating = $product->averageRating();
        }

        // Preparing the pagination data or default values when no products are found
        $paginationData = is_object($products) ? [
            'firstItem' => $products->firstItem(),
            'lastItem' => $products->lastItem(),
            'total' => $products->total()
        ] : [
            'firstItem' => 0,
            'lastItem' => 0,
            'total' => 0
        ];

        // Returning the view with the products and pagination data
        return view('livewire.frontend.product.grid', compact('products', 'paginationData'));
    }

    /**
     * updateSizeSelected
     *
     * @param  mixed $size
     * @param  mixed $isChecked
     * @return void
     */
    public function updateSizeSelected($size, $isChecked)
    {
        if ($isChecked) {
            // If the size is not already in the sizes array, add it
            $this->sizes = array_unique(array_merge($this->sizes, [$size]));
        } else {
            // If the size checkbox is unchecked, remove it from the sizes array
            $this->sizes = array_values(array_diff($this->sizes, [$size]));
        }
        // Reset the page number when the filter is updated
        $this->resetPage();
    }

    /**
     * updateCategorySelected
     *
     * @param  mixed $categoryId
     * @param  mixed $isChecked
     * @return void
     */
    public function updateCategorySelected($categoryId, $isChecked)
    {
        // Add or remove categoryId from filters based on the value of $isChecked
        if ($isChecked) {
            // Add categoryId to filters if it's not already there
            $this->categoryFilters = array_unique(array_merge($this->categoryFilters, [$categoryId]));
        } else {
            // Remove categoryId from filters if it's present
            $this->categoryFilters = array_values(array_diff($this->categoryFilters, [$categoryId]));
        }

        // Reset the page number when filters are updated
        $this->resetPage();
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


    public function openModal(ProductService $productService,$productUid)
    {
        $product = $productService->getProductByUid($productUid);
        $this->emit('openModalProduct', $product);
    }




}
