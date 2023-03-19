<div class="">
    <div class="product-wrapper-grid">
        <div class="row margin-res">
            @foreach ($products as $product)
            <div class="col-xl-3 col-6 col-grid-box" wire:key="{{ $product->product_id }}">
                <div class="product-box">
                    <div class="img-wrapper">
                        @if ($product->discount > 0)
                        <div class="lable-block">
                            <span class="lable3"> {{ round(($product->discount / $product->price) * 100) }}%</span>
                        </div>

                        @endif

                        <div class="front">
                            <a href="#"><img src="{{ asset('storage/'.$product->thumbnail) }}"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="#">
                                @if($product->images->first()->image_name == null)
                                <img src="{{ asset('storage/'.$product->thumbnail) }}"
                                    class="img-fluid blur-up lazyload bg-img" alt="{{ $product->product_name }}">
                                @else
                                <img src="{{ asset('storage/'.$product->images->first()->image_name) }}"
                                    class="img-fluid blur-up lazyload bg-img" alt="{{ $product->product_name }}">
                                @endif

                            </a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div>
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i>
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(no-sidebar).html">
                                <h6>{{ $product->product_name }}</h6>
                            </a>
                            <p>{{ $product->product_description }}</p>
                            <div class="d-flex">
                                <h4>Rp. {{ number_format($product->price - $product->discount, 0, ',', '.') }}</h4>
                                @if ($product->discount > 0)
                                <del style="margin-left: 10px;"> Rp. {{ number_format($product->price, 0, ',', '.') }}</del>
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
    </div>
    {{-- <div class="d-flex justify-content-center mt-5">
        {{ $products->links('frontend.product.custom-pagination') }}
    </div> --}}
    <div class="product-pagination">
        <div class="theme-paggination-block">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    {{ $products->links('frontend.product.custom-pagination') }}
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="product-search-count-bottom">
                        <h5>Menampilkan Produk {{ $paginationData['firstItem'] }}-{{ $paginationData['lastItem'] }}
                            dari {{ $paginationData['total'] }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
