<div class="icon-nav">
    <ul>
        <li class="onhover-div mobile-cart">
            <div><img src="{{ asset('assets/assets/images/icon/cart.png') }}" class="img-fluid blur-up lazyload" alt="">
                <i class="ti-shopping-cart"></i></div>
            <span class="cart_qty_cls">{{ $carts->count() }}</span>
            <ul class="show-div shopping-cart">
                {{-- Start Cart Customer --}}
                @php
                $subtotal = 0;
                @endphp
                @foreach ($carts as $cart)
                <li>
                    <div class="media">
                        <a href="#"><img alt="" class="me-3" src="{{ asset('storage/'.$cart->product->thumbnail) }}"></a>
                        <div class="media-body">
                            <a href="#">
                                <h4>{{ $cart->product->product_name }}</h4>
                            </a>
                            <p>Warna : {{ $cart->color }} &nbsp; Ukuran : {{ $cart->size }}</p>
                            <h4>
                                <span>
                                    {{ $cart->quantity }} x
                                    @php
                                        $totalPerPrice = $cart->quantity * $cart->product->price;
                                    @endphp
                                    @if ($cart->product->discount > 0)
                                    Rp. {{ number_format($totalPerPrice - $cart->product->discount, 0, ',', '.') }}
                                    @else
                                    Rp. {{ number_format($totalPerPrice, 0, ',', '.') }}
                                    @endif
                                </span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle"><a href="javascript:void(0)" wire:click="deleteCart('{{ $cart->cart_uid }}')"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                </li>
                {{-- Count Sub Total --}}
                @php
                if ($cart->product->discount > 0){
                $subtotal += $totalPerPrice - $cart->product->discount;
                }else{
                $subtotal += $totalPerPrice;
                }
                @endphp

                @endforeach
                {{-- End Cart Customer --}}

                <li>
                    <div class="total">
                        <h5>Total : <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ route('cart.index') }}" class="view-cart">Keranjang</a>
                        <a href="#" class="checkout">Checkout</a>
                    </div>
                </li>
            </ul>
        </li>


    </ul>
    @if (session()->has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

</div>
