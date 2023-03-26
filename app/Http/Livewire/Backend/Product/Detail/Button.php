<?php

namespace App\Http\Livewire\Backend\Product\Detail;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Button extends Component
{

    public $product;
    protected $listeners = [
        'deleteConfirmation' => 'destroy',
    ];

    public function mount($product)
    {
        // dd($product);
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.backend.product.detail.button');
    }


    /**
     * deleteConfirmation
     *
     * @param  mixed $productId
     * @return void
     */
    public function deleteConfirmation($productId)
    {
        $this->product  = $productId;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }


    /**
     * destroy
     */
    public function destroy()
    {
        $product = Product::find($this->product_id);
        $productTag = ProductTag::where('product_id', $this->product_id)->delete();

        // Menghapus product images
        $productImages = ProductImage::where('product_id', $this->product_id)->get();
        foreach ($productImages as $productImage) {
            // Delete Image from Storage
            Storage::delete('public/' . $productImage->image_name);
            // Hapus record product image dari database
            $productImage->delete();
        }
        // Delete Thumbnail from Storage
        Storage::delete('public/' . $product->thumbnail);
        $product->delete();
        return redirect()->route('backend.product.index')->with('success', 'Produk Berhasil di Hapus!');
        // Set Flash Message
        // session()->flash('success', 'Produk Berhasil di Hapus!');
    }
}
