@push('styles')

@endpush
<x-frontend.master title="Khadijah Label">

    {{-- Start Slider --}}
    <x-frontend.home.slider />
    {{-- End Slider --}}

    {{-- Start Collection Banner --}}
    <x-frontend.home.collection-banner />
    {{-- End Collection Banner --}}

    {{-- Start Paragraph --}}
    <x-frontend.home.paragraph />
    {{-- End Paragraph --}}

    {{-- Start Product Slider --}}
    <x-frontend.home.product-slider>
        {{-- Start Product Box --}}
        @livewire('frontend.home.product-box')
        {{-- End Product Box --}}
    </x-frontend.home.product-slider>
    {{-- End Product Slider --}}

    {{-- Start Parallax Banner --}}
    <x-frontend.home.parallax-banner />
    {{-- End Parallax Banner --}}

    {{-- Start Tab Product --}}
    <x-frontend.home.tab-product />
    {{-- End Tab Product --}}

    {{-- *** TODO: TAB PRODUCTS *** --}}
    {{-- Start Tab Product Content --}}
    <x-frontend.home.tab-product-content>
        {{-- Start Product Content --}}
        <div id="tab-4" class="tab-content active default">
            <div class="no-slider row">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/27.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/28.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>purple solid polo tshirt</h6>
                        </a>
                        <h4>$50.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/1.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/2.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>sleevles white tshirt with text</h6>
                        </a>
                        <h4>$65.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>multi-color polo tshirt</h6>
                        </a>
                        <h4>$45.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/35.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/36.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>Candy red solid tshirt</h6>
                        </a>
                        <h4>$30.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>multi-color polo tshirt</h6>
                        </a>
                        <h4>$65.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/35.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/36.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>Candy red solid tshirt</h6>
                        </a>
                        <h4>$500.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/1.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/2.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>sleevles white tshirt with text</h6>
                        </a>
                        <h4>$50.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/27.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/28.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>purple solid polo tshirt</h6>
                        </a>
                        <h4>$25.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab-5" class="tab-content">
            <div class="no-slider row">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>purple solid polo tshirt</h6>
                        </a>
                        <h4>$50.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/35.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/36.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>Candy red solid tshirt</h6>
                        </a>
                        <h4>$35.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/1.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/2.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>sleevles white tshirt with text</h6>
                        </a>
                        <h4>$55.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/27.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/28.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>purple solid polo tshirt</h6>
                        </a>
                        <h4>$56.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/27.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/28.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>purple solid polo tshirt</h6>
                        </a>
                        <h4>$35.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/1.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/2.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>sleevles white tshirt with text</h6>
                        </a>
                        <h4>$16.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>multi-color polo tshirt</h6>
                        </a>
                        <h4>$19.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/35.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/36.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>Candy red solid tshirt</h6>
                        </a>
                        <h4>$18.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab-6" class="tab-content">
            <div class="no-slider row">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>multi-color polo tshirt</h6>
                        </a>
                        <h4>$25.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/27.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/28.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>purple solid polo tshirt</h6>
                        </a>
                        <h4>$35.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/33.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/34.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>multi-color polo tshirt</h6>
                        </a>
                        <h4>$28.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/1.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/2.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>sleevles white tshirt with text</h6>
                        </a>
                        <h4>$16.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/35.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/36.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>Candy red solid tshirt</h6>
                        </a>
                        <h4>$24.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/35.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/36.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>Candy red solid tshirt</h6>
                        </a>
                        <h4>$24.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block"><span class="lable3">new</span> <span class="lable4">on
                                sale</span></div>
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/1.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/2.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>sleevles white tshirt with text</h6>
                        </a>
                        <h4>$38.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/27.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="product-page(no-sidebar).html"><img src="../assets/images/pro3/28.jpg"
                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i
                                    class="ti-shopping-cart"></i></button> <a href="javascript:void(0)"
                                title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                    aria-hidden="true"></i></a>
                            <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </div>
                        <a href="product-page(no-sidebar).html">
                            <h6>purple solid polo tshirt</h6>
                        </a>
                        <h4>$24.00</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Product Content --}}
    </x-frontend.home.tab-product-content>
    {{-- End Tab Product Content --}}


    {{-- Start Service Layout --}}
    <x-frontend.home.service-layout />
    {{-- End Service Layout --}}


    {{-- *** TODO: BLOG SECTION *** --}}
    {{-- Start Blog Section --}}
    <x-frontend.home.blog-section>
        {{-- Start Blog Content --}}

        <div class="col-md-12">
            <a href="#">
                <div class="classic-effect">
                    <div>
                        <img src="../assets/images/blog/1.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                    </div>
                    <span></span>
                </div>
            </a>
            <div class="blog-details">
                <h4>25 January 2021</h4>
                <a href="#">
                    <p>Top 10 January Best-Sellers Products – All Under $50!</p>
                </a>
                <hr class="style1">
                <h6>by: John Dio , 2 Comment</h6>
            </div>
        </div>
        <div class="col-md-12">
            <a href="#">
                <div class="classic-effect">
                    <div>
                        <img src="../assets/images/blog/2.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                    </div>
                    <span></span>
                </div>
            </a>
            <div class="blog-details">
                <h4>25 January 2018</h4>
                <a href="#">
                    <p>Quarantine Birthday Celebration | In The Times of COVID-19</p>
                </a>
                <hr class="style1">
                <h6>by: John Dio , 2 Comment</h6>
            </div>
        </div>
        <div class="col-md-12">
            <a href="#">
                <div class="classic-effect">
                    <div>
                        <img src="../assets/images/blog/3.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                    </div>
                    <span></span>
                </div>
            </a>
            <div class="blog-details">
                <h4>25 January 2018</h4>
                <a href="#">
                    <p>London fashion & Hair Trends From Fashion Week</p>
                </a>
                <hr class="style1">
                <h6>by: John Dio , 2 Comment</h6>
            </div>
        </div>
        <div class="col-md-12">
            <a href="#">
                <div class="classic-effect">
                    <div>
                        <img src="../assets/images/blog/4.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                    </div>
                    <span></span>
                </div>
            </a>
            <div class="blog-details">
                <h4>25 January 2018</h4>
                <a href="#">
                    <p>Fun Fashion Clothing and Ideas for Valentine’s Day</p>
                </a>
                <hr class="style1">
                <h6>by: John Dio , 2 Comment</h6>
            </div>
        </div>
        <div class="col-md-12">
            <a href="#">
                <div class="classic-effect">
                    <div>
                        <img src="../assets/images/blog/5.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                    </div>
                    <span></span>
                </div>
            </a>
            <div class="blog-details">
                <h4>25 January 2018</h4>
                <a href="#">
                    <p>Lorem ipsum dolor sit consectetur adipiscing elit,</p>
                </a>
                <hr class="style1">
                <h6>by: John Dio , 2 Comment</h6>
            </div>
        </div>

        {{-- End Blog Content --}}
    </x-frontend.home.blog-section>
    {{-- End Blog Section --}}


    {{-- *** TODO: INSTAGRAM SECTION *** --}}
    {{-- Start Instagram Section --}}
    <x-frontend.home.instagram-section>
        {{-- Start Instagram Content --}}
        <div class="slide-7 no-arrow slick-instagram">
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/2.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/3.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/4.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/9.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/6.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/7.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/8.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/9.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="instagram-box"> <img src="../assets/images/slider/2.jpg" class="bg-img" alt="img">
                        <div class="overlay"><i class="fa-brands fa-square-instagram"></i></div>
                    </div>
                </a>
            </div>
        </div>
        {{-- End Instagram Content --}}
    </x-frontend.home.instagram-section>
    {{-- End Instagram Section --}}


    {{-- *** TODO: LOGO SECTION *** --}}
    {{-- Start Logo Section --}}
    <x-frontend.home.logo-section>
        {{-- Start Logo Content --}}
        <div class="slide-6 no-arrow">
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/1.png" alt=""></a>
                </div>
            </div>
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/2.png" alt=""></a>
                </div>
            </div>
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/3.png" alt=""></a>
                </div>
            </div>
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/4.png" alt=""></a>
                </div>
            </div>
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/5.png" alt=""></a>
                </div>
            </div>
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/6.png" alt=""></a>
                </div>
            </div>
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/7.png" alt=""></a>
                </div>
            </div>
            <div>
                <div class="logo-block">
                    <a href="#"><img src="../assets/images/logos/8.png" alt=""></a>
                </div>
            </div>
        </div>
        {{-- End Logo Content --}}
    </x-frontend.home.logo-section>
    {{-- End Logo Section --}}
@livewire('frontend.product.detail-cart')
<!-- section End -->
@push('scripts')
<script>
    window.addEventListener('close-modal-product', event =>{
        $('#quick-view').modal('hide');
    });
</script>
@endpush
</x-frontend.master>
