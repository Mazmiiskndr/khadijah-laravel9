@push('styles')

@endpush
<x-frontend.master title="Produk | Khadijah Label">
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Produk</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produk</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->


<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    <!-- side-bar colleps block stat -->
                    {{-- START NEW PRODUCTS --}}
                    {{-- *** TODO: --}}
                    <div class="mb-3">
                        @livewire('frontend.product.left-new-product')
                    </div>
                    {{-- END NEW PRODUCTS --}}
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back">
                            <span class="filter-back">
                                <i class="fa fa-angle-left"
                                    aria-hidden="true">
                                </i>
                                Kembali
                            </span>
                        </div>
                        {{-- START CATEGORY PRODUCTS --}}
                        {{-- *** TODO: --}}
                        @livewire('frontend.product.left-category')
                        {{-- END CATEGORY PRODUCTS --}}

                        <!-- color filter start here -->
                        {{-- *** TODO: COLORS *** --}}
                        {{-- <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">colors</h3>
                            <div class="collection-collapse-block-content">
                                <div class="color-selector">
                                    <ul>
                                        <li class="color-1 active"></li>
                                        <li class="color-2"></li>
                                        <li class="color-3"></li>
                                        <li class="color-4"></li>
                                        <li class="color-5"></li>
                                        <li class="color-6"></li>
                                        <li class="color-7"></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                        {{-- START SIZE PRODUCTS --}}
                        {{-- *** TODO: --}}
                        @livewire('frontend.product.left-size')
                        {{-- END SIZE PRODUCTS --}}

                    </div>
                    <!-- silde-bar colleps block end here -->



                    <!-- side-bar single product slider end -->
                    <!-- side-bar banner start here -->
                    <div class="collection-sidebar-banner">
                        <a href="#">
                            <img src="{{ asset('assets/images/frontend/banner/left-banner-product.jpg') }}" class="img-fluid blur-up lazyload"
                                alt="">
                            </a>
                    </div>
                    <!-- side-bar banner end here -->
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="#"><img src="{{ asset('assets/images/frontend/banner/banner-product-1.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt=""></a>
                                    <div class="top-banner-content small-section">
                                        <h4>PROMO TERBESAR UNTUK MEREK-MEREK TERBAIK</h4>
                                        <p>Untuk tampil anggun dan syari saat beribadah, pilihlah mukena terbaik yang sesuai dengan selera dan kebutuhanmu.
                                        Khadijah menyediakan beragam pilihan mukena berkualitas dengan berbagai model dan warna yang menarik. Dapatkan
                                        keuntungan berbelanja di Khadijah, seperti pengiriman cepat, opsi pembayaran yang fleksibel, dan layanan pengembalian
                                        yang mudah. Ayo belanja mukena di Khadijah sekarang! </p>

                                    </div>
                                </div>
                                {{-- Start Search Product --}}
                                @livewire('frontend.product.search-product')
                                {{-- End Search Product --}}

                                <div class="collection-product-wrapper">
                                    {{-- Start Product Filter --}}
                                    @livewire('frontend.product.product-filter')
                                    {{-- End Product Filter --}}

                                    {{-- Start Product Grid --}}
                                    @livewire('frontend.product.grid')
                                    {{-- End Product Grid --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->
</x-frontend.master>

@push('scripts')

@endpush
