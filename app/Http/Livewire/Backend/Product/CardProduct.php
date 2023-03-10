<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Carbon\Carbon;
use App\Services\Product\ProductService;
use Illuminate\Support\Facades\Storage;
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
        'productDeleted' => 'handleDeleted',
        'searchProduct' => 'updateSearch',
        'showingProduct' => 'updateShowing',
        'categorySelected' => 'updateCategorySelected',
        'deleteConfirmation' => 'destroy',
        'productCreated' => 'handleStored',
        'updatedProduct' => 'handleUpdated',
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
     * getProduct
     *
     * @param  mixed $product_id
     * @return void
     */
    public function getProduct($product_id)
    {
        $product = Product::with('images','category','tags')->findOrFail($product_id);
        $this->emit('getProduct', $product);
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
    public function destroy()
    {
        $product = Product::find($this->product_id);
        $productTag = ProductTag::where('product_id', $this->product_id)->delete();

        // Menghapus product images
        $productImages = ProductImage::where('product_id', $this->product_id)->get();
        foreach ($productImages as $productImage) {
            // Delete Image from Storage
            Storage::delete('public/'.$productImage->image_name);
            // Hapus record product image dari database
            $productImage->delete();

        }
        // Delete Thumbnail from Storage
        Storage::delete('public/' . $product->thumbnail);
        $product->delete();
        // Emit event to reload datatable
        $this->emit('productDeleted', $product);
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

    /**
     * handleDeleted
     *
     * @return void
     */
    public function handleDeleted()
    {
        //
    }

    /**
     * handleUpdated
     *
     * @return void
     */
    public function handleUpdated()
    {
        //
    }

}
