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

            {{-- Start Categories List --}}
            <x-frontend.gallery.category />
            {{-- End Categories List --}}

            <div class="row  zoom-gallery">
                <div class="isotopeSelector filter fashion col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/1.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/1.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter shoes col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/2.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/2.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter bags col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/3.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/3.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter bags col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/4.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/4.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter bags col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/5.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/5.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter watch col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/6.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/6.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter bags col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/7.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/7.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter bags col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/8.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/8.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter fashion col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/9.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/9.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter shoes col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/10.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/10.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter bags col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/11.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/11.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="isotopeSelector filter fashion col-lg-3 col-sm-6">
                    <div class="overlay">
                        <div class="border-portfolio">
                            <a href="../assets/images/portfolio/grid/12.jpg">
                                <div class="overlay-background">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                                <img src="../assets/images/portfolio/grid/12.jpg" class="img-fluid blur-up lazyload bg-img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
