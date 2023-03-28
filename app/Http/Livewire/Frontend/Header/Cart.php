<?php

namespace App\Http\Livewire\Frontend\Header;

use App\Models\Cart as ModelsCart;
use App\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $cart_uid,$cart_id;
    protected $listeners = [
        'homeCartCreated' => 'handleHomeCart',
        'deleteCart' => 'destroy',
    ];

    public function render(CartService $cartService)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $carts = $cartService->getAllDataByCustomer($customer_id);
        // dd($carts);
        return view('livewire.frontend.header.cart',[
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
        $this->dispatchBrowserEvent('delete-cart-show-confirmation');
    }

    /**
     * destroy
     *
     * @param  mixed $uid
     * @return void
     */
    public function destroy()
    {
        $cart = ModelsCart::where('cart_uid',$this->cart_uid)->first();
        if ($cart) {
            $cart->delete();
            session()->flash('success', 'Keranjang Berhasil di Hapus!');
        }
    }



    /**
     * handleHomeCart
     */
    public function handleHomeCart()
    {
        //
    }
}
