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
                <a href="{{ route('product.show', ['product' => $product->product_slug]) }}"><img
                        src="{{ asset('storage/'.$product->thumbnail) }}" class="img-fluid blur-up lazyload bg-img"
                        alt=""></a>
            </div>
            <div class="back">

                <a href="{{ route('product.show', ['product' => $product->product_slug]) }}">
                    @if($product->images->first()->image_name == null)
                    <img src="{{ asset('storage/'.$product->thumbnail) }}" class="img-fluid blur-up lazyload bg-img"
                        alt="{{ $product->product_name }}">
                    @else
                    <img src="{{ asset('storage/'.$product->images->first()->image_name) }}"
                        class="img-fluid blur-up lazyload bg-img" alt="{{ $product->product_name }}">
                    @endif
            </div>
            <div class="cart-info cart-wrap">
                <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart">
                    <i class="ti-shopping-cart"></i>
                </button>
                <a href="javascript:void(0)" title="Add to Wishlist">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">
                    <i class="ti-search" aria-hidden="true"></i>
                </a>
                <a href="{{ route('product.show', ['product' => $product->product_slug]) }}" title="Compare">
                    <i class="ti-eye" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="product-detail">
            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star"></i>
            </div>
            <a href="{{ route('product.show', ['product' => $product->product_slug]) }}">
                <h6>{{ $product->product_name }}</h6>
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
