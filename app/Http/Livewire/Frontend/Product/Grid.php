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
        $products = $productService->getProductFrontend($this->perPage, $this->search, $this->showing, $this->categoryFilters, $this->sizes);

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

    // create function updateSizeSelected
    public function updateSizeSelected($size, $isChecked)
    {

        if ($isChecked) {
            if (!in_array($size, $this->sizes)) {
                $this->sizes[] = $size;
            }
        } else {
            $index = array_search($size, $this->sizes);
            if ($index !== false) {
                unset($this->sizes[$index]);
            }
        }

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
        if ($isChecked) {
            if (!in_array($categoryId, $this->categoryFilters)) {
                $this->categoryFilters[] = $categoryId;
            }
        } else {
            $index = array_search($categoryId, $this->categoryFilters);
            if ($index !== false) {
                unset($this->categoryFilters[$index]);
            }
        }

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
