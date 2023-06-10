<?php

namespace App\Http\Livewire\Backend\Product\Detail;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Button extends Component
{

    // Declares a public property named 'product'.
    public $product;

    // Sets up a listener for the 'deleteConfirmation' event, which triggers the 'destroy' method.
    protected $listeners = [
        'deleteConfirmation' => 'destroy',
    ];

    /**
     * The "mount" function assigns a value to the "product" property of the current object.
     * @param product The parameter `` is a variable that represents the product being mounted.
     */
    public function mount($product)
    {
        $this->product = $product;
    }

    /**
     * This PHP function returns a view for a button component in a product detail page.
     * @return view called "livewire.backend.product.detail.button".
     */
    public function render()
    {
        return view('livewire.backend.product.detail.button');
    }

    /**
     * This PHP function sets a product ID and triggers a browser event to show a delete confirmation.
     *
     * @param productId The parameter `` is a variable that represents the ID of a product
     * that is being deleted. It is passed as an argument to the `deleteConfirmation` function.
     */
    public function deleteConfirmation($productId)
    {
        $this->product  = $productId;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }

    /**
     * This function deletes a product and its associated tags and images from the database and
     * storage.
     * @return a redirect to the index page of the product backend with a success message.
     */
    public function destroy()
    {
        // Finds the product by its ID.
        $product = Product::find($this->product);
        // Deletes all tags associated with the product.
        $productTag = ProductTag::where('product_id', $this->product)->delete();

        // Fetches all images associated with the product.
        $productImages = ProductImage::where('product_id', $this->product)->get();
        foreach ($productImages as $productImage) {
            // Deletes an image file associated with the product from storage.
            Storage::delete('public/' . $productImage->image_name);
            // Deletes the record of the product image from the database.
            $productImage->delete();
        }
        // Deletes the product's thumbnail image from storage.
        Storage::delete('public/' . $product->thumbnail);
        // Deletes the product record from the database.
        $product->delete();
        // Redirects the user back to the product index page with a success message.
        return redirect()->route('backend.product.index')->with('success', 'Produk Berhasil di Hapus!');
    }
}
