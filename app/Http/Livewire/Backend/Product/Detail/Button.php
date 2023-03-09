<?php

namespace App\Http\Livewire\Backend\Product\Detail;

use App\Models\Product;
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
     *
     * @return void
     */
    public function destroy()
    {
        $product = Product::find($this->product);
        $product->delete();
        return redirect()->route('backend.product.index')->with('success', 'Produk Berhasil di Hapus!');
        // Set Flash Message
        // session()->flash('success', 'Produk Berhasil di Hapus!');
    }
}
