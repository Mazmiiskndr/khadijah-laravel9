<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
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
    public $product_id;
    public $categoryFilters = [];

    protected $listeners = [
        'searchProduct' => 'updateSearch',
        'showingProduct' => 'updateShowing',
        'categorySelected' => 'updateCategorySelected',
        'deleteConfirmation' => 'destroy',
        'productCreated' => 'handleStored',
    ];

    public function mount()
    {
        $this->categoryFilters = request()->input('categoryFilters', []) ?? [];
    }


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

        $this->emit('paginationData', $paginationData);
        return view('livewire.backend.product.card-product', ['products' => $products]);
    }

    /**
     * deleteConfirmation
     *
     * @param  mixed $product_id
     * @return void
     */
    public function deleteConfirmation($product_id)
    {
        $this->product_id  = $product_id;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }

    /**
     * destroy
     *
     * @param  mixed $product_id
     * @return void
     */
    // *** TODO: Delete Tag, Product Images ***
    public function destroy()
    {
        $product = Product::find($this->product_id);
        $product->delete();
        // Set Flash Message
        session()->flash('success', 'Produk Berhasil di Hapus!');
    }

    /**
     * handleStored
     *
     * @return void
     */
    public function handleStored()
    {
        //
    }

}
