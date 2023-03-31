<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataTable extends Component
{
    public $cart_uid, $cart_id;
    protected $listeners = [
        // 'homeCartCreated' => 'handleHomeCart',
        // 'productCartCreated' => 'handleProductCart',
        'deleteCart' => 'destroy',
    ];

    /**
     * render
     * @param  mixed $cartService
     */
    public function render(CartService $cartService)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        // dd($carts);
        return view('livewire.frontend.cart.data-table', [
            'carts' => $cartService->getAllDataByCustomer($customer_id),
        ]);
    }

    /**
     * deleteCart
     *
     * @param  mixed $uid
     * @return void
     */
    public function deleteCart($uid)
    {
        $this->cart_uid  = $uid;
        // dd($this->cart_uid);
        $this->dispatchBrowserEvent('delete-cart-detail-show-confirmation');
    }


    /**
     * destroy
     *
     * @param  mixed $uid
     * @return void
     */
    public function destroy()
    {
        $cart = Cart::where('cart_uid', $this->cart_uid)->first();
        if ($cart) {
            $cart->delete();
            $this->emit('detailCartDeleted', $cart);
            session()->flash('success', 'Keranjang Berhasil di Hapus!');
        }
    }

}
