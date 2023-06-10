<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use App\Services\Product\ProductService;
use Livewire\Component;
use Livewire\WithPagination;


class CardProduct extends Component
{
    // Use Pagination
    use WithPagination;

    // Define public variable
    public $perPage = 6;
    public $paginationTheme = 'bootstrap';
    public $search = '';
    public $showing = '';
    public $product_id;
    public $categoryFilters = [];

    /**
     * The event listener mappings for the component.
     * @var array
     */
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
     * Mount the component.
     * @return void
     */
    public function mount()
    {
        $this->categoryFilters = request()->input('categoryFilters', []) ?? [];
    }

    /**
     * Update the selected category filters.
     * @param int $categoryId - The ID of the category
     * @param bool $isChecked - Indicates whether the category is checked or not
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
     * Handle updating the search keyword.
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Update the search keyword.
     * @param string $keyword - The search keyword
     * @return void
     */
    public function updateSearch($keyword)
    {
        $this->search = $keyword;
    }

    /**
     * Update the showing option.
     * @param string $showing - The showing option
     * @return void
     */
    public function updateShowing($showing)
    {
        $this->showing = $showing;
    }

    /**
     * Render the component.
     * @param ProductService $productService - The product service
     * @return \Illuminate\Contracts\View\View
     */
    public function render(ProductService $productService)
    {
        // Retrieve paginated data based on search, showing, and category filters
        $products = $productService->getPaginatedData($this->perPage, $this->search, $this->showing, $this->categoryFilters);

        // Prepare pagination data
        $paginationData = is_object($products) ? [
            'firstItem' => $products->firstItem(),
            'lastItem' => $products->lastItem(),
            'total' => $products->total()
        ] : [
            'firstItem' => 0,
            'lastItem' => 0,
            'total' => 0
        ];

        // Emit pagination data event
        $this->emit('paginationData', $paginationData);

        // Render the view with the retrieved products
        return view('livewire.backend.product.card-product', ['products' => $products]);

    }

    /**
     * Get the product by ID.
     * @param int $product_id - The ID of the product
     * @return void
     */
    public function getProduct($product_id)
    {
        $product = Product::with('images', 'category', 'tags')->findOrFail($product_id);
        $this->emit('getProduct', $product);
    }

    /**
     * Show the delete confirmation modal.
     * @param int $product_id - The ID of the product to delete
     * @return void
     */
    public function deleteConfirmation($product_id)
    {
        $this->product_id  = $product_id;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }

    /**
     * Delete the product.
     * @param ProductService $productService - The product service
     * @return void
     */
    public function destroy(ProductService $productService)
    {
        // Check if a product ID is set
        if ($this->product_id) {
            // Delete the product using ProductService
            $deletedProduct = $productService->deleteProduct($this->product_id, $this);

            // Check if the product deletion was successful
            if ($deletedProduct) {
                // Emit 'productDeleted' event with the deleted product
                $this->emit('productDeleted', $deletedProduct);

                // Set flash message indicating successful deletion
                session()->flash('success', 'Produk Berhasil di Hapus!');
            }
        }

    }

    /**
     * Handle the product stored event.
     * @return void
     */
    public function handleStored()
    {
        //
    }

    /**
     * Handle the product deleted event.
     * @return void
     */
    public function handleDeleted()
    {
        //
    }

    /**
     * Handle the product updated event.
     * @return void
     */
    public function handleUpdated()
    {
        //
    }


}
