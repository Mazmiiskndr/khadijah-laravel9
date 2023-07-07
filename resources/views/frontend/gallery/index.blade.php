<x-frontend.master title="Galeri">
    @push('styles')
    <!-- magnific css -->
    <link rel="stylesheet" href="{{ asset('assets/assets/css/vendors/magnific-popup.css') }}">
    @endpush

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Galeri</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- Our Project Start -->
    <section class="portfolio-section portfolio-padding grid-portfolio ratio2_3">
        <div class="container">

            <div class="row  zoom-gallery">
                @foreach ($products as $product)

                <div class="isotopeSelector filter col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="{{ asset('storage/'.$product->thumbnail) }}">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="{{ asset('storage/'.$product->thumbnail) }}"
                                    class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
    </section>
    <!-- Our Project End -->

    @push('scripts')
    <!-- portfolio js -->
    <script src="{{ asset('assets/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/assets/js/zoom-gallery.js') }}"></script>

    <script>
        function openSearch() {
                document.getElementById("search-overlay").style.display = "block";
            }

            function closeSearch() {
                document.getElementById("search-overlay").style.display = "none";
            }
    </script>
    @endpush

</x-frontend.master>
