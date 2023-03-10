<x-backend.master title="Galeri Produk | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/photoswipe.css') }}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Galeri Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Galeri Produk</li>
    @endslot

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Galeri Produk</h5>

                            {{-- START FORM SEARCH GALLERY PRODUCT --}}
                            @livewire('backend.product.search-gallery-product')
                            {{-- START FORM SEARCH GALLERY PRODUCT --}}

                        </div>
                    </div>

                    {{-- START GALLERY PRODUCT --}}
                    @livewire('backend.product.gallery-product')
                    {{-- END GALLERY PRODUCT --}}

                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                        <!--
                            Background of PhotoSwipe.
                            It's a separate element, as animating opacity is faster than rgba().
                            -->
                        <div class="pswp__bg"></div>
                        <!-- Slides wrapper with overflow:hidden.-->
                        <div class="pswp__scroll-wrap">
                            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory.-->
                            <!-- don't modify these 3 pswp__item elements, data is added later on.-->
                            <div class="pswp__container">
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                            </div>
                            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
                            <div class="pswp__ui pswp__ui--hidden">
                                <div class="pswp__top-bar">
                                    <!-- Controls are self-explanatory. Order can be changed.-->
                                    <div class="pswp__counter"></div>
                                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                    <button class="pswp__button pswp__button--share" title="Share"></button>
                                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
                                    <!-- element will get class pswp__preloader--active when preloader is running-->
                                    <div class="pswp__preloader">
                                        <div class="pswp__preloader__icn">
                                            <div class="pswp__preloader__cut">
                                                <div class="pswp__preloader__donut"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                    <div class="pswp__share-tooltip"></div>
                                </div>
                                <button class="pswp__button pswp__button--arrow--left"
                                    title="Previous (arrow left)"></button>
                                <button class="pswp__button pswp__button--arrow--right"
                                    title="Next (arrow right)"></button>
                                <div class="pswp__caption">
                                    <div class="pswp__caption__center"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Include livewire modal --}}
    @push('scripts')
    <script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
    @endpush

</x-backend.master>
