<div class="row search-product">
    @foreach ($productLimits as $productLimit)
    <div class="col-xl-2 col-md-4 col-6">
        <div class="product-box">
            <div class="img-wrapper">
                <div class="front">
                    <a href="{{ route('product.show', ['product' => $productLimit->product_slug]) }}"><img
                            src="{{ asset('storage/'.$productLimit->thumbnail) }}"
                            class="img-fluid blur-up lazyload bg-img" alt="{{ $productLimit->product_name }}"></a>
                </div>
                <div class="back">
                    <a href="{{ route('product.show', ['product' => $productLimit->product_slug]) }}">
                        @if($productLimit->images->first()->image_name == null)
                        <img src="{{ asset('storage/'.$productLimit->thumbnail) }}"
                            class="img-fluid blur-up lazyload bg-img" alt="{{ $productLimit->product_name }}">
                        @else
                        <img src="{{ asset('storage/'.$productLimit->images->first()->image_name) }}"
                            class="img-fluid blur-up lazyload bg-img" alt="{{ $productLimit->product_name }}">
                        @endif

                    </a>
                </div>
                <div class="cart-info cart-wrap">
                    @if(Auth::guard('customer')->check())
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"
                        wire:click="openModal('{{ $productLimit->product_uid }}')">
                        <i class="fas fa fa-cart-shopping"></i>
                        {{-- wire:click="addToCart('{{ $productLimit->product_uid }}')" --}}
                    </a>
                    @else
                    <a href="javascript:void(0)">
                        <i class="fas fa fa-cart-shopping" data-bs-toggle="modal" data-bs-target="#quick-view"
                            wire:click="openModal('{{ $productLimit->product_uid }}')"></i>
                    </a>
                    @endif
                    <a href="{{ route('product.show', ['product' => $productLimit->product_slug]) }}" title="Compare">
                        <i class="fas fa-eye" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="product-detail">
                <div>
                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div>
                    <a href="{{ route('product.show', ['product' => $productLimit->product_slug]) }}">
                        <h6>{{ $productLimit->product_name }}</h6>
                    </a>
                    <div class="d-flex">
                        <h4>Rp. {{ number_format($productLimit->price - $productLimit->discount, 0, ',',
                            '.') }}</h4>
                        @if ($productLimit->discount > 0)
                        <del style="margin-left: 10px;"> Rp. {{ number_format($productLimit->price, 0, ',',
                            '.') }}</del>
                        @endif
                    </div>
                    {{-- <ul class="color-variant">
                        <li class="bg-light0"></li>
                        <li class="bg-light1"></li>
                        <li class="bg-light2"></li>
                    </ul> --}}
                </div>
            </div>
        </div>

    </div>
    @endforeach
</div>
