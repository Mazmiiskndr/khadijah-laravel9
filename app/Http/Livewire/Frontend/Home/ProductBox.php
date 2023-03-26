<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Cart;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductBox extends Component
{
    public $cart_uid, $product_uid,$customer_id,$product_id,$quantity;
    public function render(ProductService $productService)
    {
        return view('livewire.frontend.home.product-box', [
            'products' => $productService->getLimitData(5),
        ]);
    }


    /**
     * addToCart
     * @param  mixed $uid
     */
    public function addToCart($uid)
    {

        // Cek apakah user sudah login atau tidak jika sudah login maka redirect ke halaman login
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login')->with('notlogin', 'Silahkan login terlebih dahulu!');
        }
        // Get product by uid
        $product = Product::where('product_uid',$uid)->first();

        // Check if product is not empty
        if (!empty($product)) {
            $this->customer_id = Auth::guard('customer')->user()->id;
            $this->product_id = $product->product_id;
            $this->quantity = 1;

            // Create New Cart
            Cart::create([
                'product_id' => $this->product_id,
                'customer_id' => $this->customer_id,
                'quantity' => $this->quantity,
            ]);

            // Set Flash Message
            // session()->flash('success', 'Produk Berhasil di Tambahkan!');
            $this->dispatchBrowserEvent('success-cart');
        }
    }
}
