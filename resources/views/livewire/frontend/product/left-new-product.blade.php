<div class="theme-card">
    <h5 class="title-border">Produk Terbaru</h5>
    {{-- *** TODO: Link Detail *** --}}
    <div class="offer-slider slide-1">
        <div>
            @foreach ($products1 as $product1)

            <div class="media">
                <a href="{{ route('product.show', ['product' => $product1->product_slug]) }}"><img class="img-fluid blur-up lazyload" src="{{ asset('storage/'.$product1->thumbnail) }}"
                        alt=""></a>
                <div class="media-body align-self-center">
                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div><a href="{{ route('product.show', ['product' => $product1->product_slug]) }}">
                        <h6>{{ $product1->product_name }}</h6>
                    </a>
                    <h4>Rp. {{ number_format($product1->price - $product1->discount, 0, ',', '.') }}</h4>
                </div>
            </div>
            @endforeach

        </div>
        <div>
            @foreach ($products2 as $product2)

            <div class="media">
                <a href="{{ route('product.show', ['product' => $product2->product_slug]) }}"><img class="img-fluid blur-up lazyload" src="{{ asset('storage/'.$product2->thumbnail) }}"
                        alt=""></a>
                <div class="media-body align-self-center">
                    <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div><a href="{{ route('product.show', ['product' => $product2->product_slug]) }}">
                        <h6>{{ $product2->product_name }}</h6>
                    </a>
                    <h4>Rp. {{ number_format($product2->price - $product2->discount, 0, ',', '.') }}</h4>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
