<div class="product-4 product-m no-arrow">
    @foreach ($products as $product)


    <div class="product-box" wire:key="{{ $product->product_id }}">
        <div class="img-wrapper">
            @if ($product->discount > 0)
            <div class="lable-block">
                <span class="lable3"> {{ round(($product->discount / $product->price) * 100) }}%</span>
            </div>

            @endif
            <div class="front">
                <a href="javascript:void(0)"><img src="{{ asset('storage/'.$product->thumbnail) }}"
                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
            </div>
            <div class="back">

                <a href="javascript:void(0)">
                    @if(!isset($product->images->first()->image_name))
                    <img src="{{ asset('storage/'.$product->thumbnail) }}" class="img-fluid blur-up lazyload bg-img"
                        alt="{{ $product->product_name }}">
                    @else
                    <img src="{{ asset('storage/'.$product->images->first()->image_name) }}"
                        class="img-fluid blur-up lazyload bg-img" alt="{{ $product->product_name }}">
                    @endif
            </div>
            <div class="cart-info cart-wrap">
                @if(Auth::guard('customer')->check())
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"
                    wire:click="openModal('{{ $product->product_uid }}')">
                    <i class="fas fa fa-cart-shopping"></i>
                    {{-- wire:click="addToCart('{{ $product->product_uid }}')" --}}
                </a>
                @else
                <a href="javascript:void(0)">
                    <i class="fas fa fa-cart-shopping" data-bs-toggle="modal" data-bs-target="#quick-view"
                        wire:click="openModal('{{ $product->product_uid }}')"></i>
                </a>
                @endif
                <a href="javascript:void(0)" title="Add to Wishlist">
                    <i class="fas fa-heart" aria-hidden="true"></i>
                </a>
                <a href="{{ route('product.show', ['product' => $product->product_slug]) }}" title="Compare">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="product-detail">
            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star"></i>
            </div>
            <a href="{{ route('product.show', ['product' => $product->product_slug]) }}">
                <h6>{{ $product->product_name }} </h6>
            </a>
            <div class="d-flex">
                <h4>Rp. {{ number_format($product->price - $product->discount, 0, ',', '.') }}</h4>
                @if ($product->discount > 0)
                <del style="margin-left: 10px;"> Rp. {{ number_format($product->price, 0, ',', '.') }}</del>
                @endif
            </div>

            {{-- *** TODO: COLOR *** --}}
            {{-- <ul class="color-variant">
                <li class="bg-light0"></li>
                <li class="bg-light1"></li>
                <li class="bg-light2"></li>
            </ul> --}}
        </div>
    </div>

    @endforeach


</div>
