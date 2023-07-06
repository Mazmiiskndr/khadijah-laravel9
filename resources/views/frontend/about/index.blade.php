<x-frontend.master title="Tentang Kami">
    @push('styles')
    @endpush

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Tentang Kami</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- about section start -->
    <section class="about-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{-- TODO: IMAGES BANNER ABOUT US --}}
                    <div class="banner-section"><img src="../assets/images/about/about-us.jpg"
                            class="img-fluid blur-up lazyload" alt=""></div>
                </div>
                <div class="col-sm-12">
                    <h4>Tentang Khadijah Label
                    </h4>
                    <p>Selamat datang di Khadijah Label! Kami adalah perusahaan yang berdedikasi untuk menyediakan Mukena berkualitas tinggi
                    kepada para pelanggan kami. Dengan pengalaman bertahun-tahun di industri ini, kami bangga menjadi salah satu penyedia
                    Mukena terkemuka di Tasikmalaya.

                    Kami memahami pentingnya kenyamanan dan kepercayaan dalam memilih Mukena yang tepat. Oleh karena itu, kami dengan teliti
                    memilih bahan-bahan terbaik dan menjalani proses produksi yang cermat untuk memastikan setiap Mukena yang kami hasilkan
                    memenuhi standar kualitas yang tinggi.

                    Kami juga mengutamakan desain yang modern dan elegan untuk memenuhi berbagai preferensi gaya dan selera fashion Anda.
                    Setiap detail pada setiap Mukena kami dirancang dengan penuh perhatian untuk memberikan tampilan yang anggun dan
                    mempesona.

                    Selain kualitas produk yang unggul, kami juga memberikan pelayanan pelanggan yang terbaik. Tim layanan pelanggan kami
                    siap membantu Anda dalam memilih Mukena yang sesuai, menjawab pertanyaan Anda, dan menangani kebutuhan Anda dengan ramah
                    dan responsif.

                    Kami berkomitmen untuk memberikan pengalaman belanja online yang menyenangkan dan memuaskan. Dengan fitur pengiriman
                    yang cepat dan aman, Anda dapat memiliki Mukena impian Anda dalam waktu singkat.

                    Kami berterima kasih kepada pelanggan setia kami yang telah memberikan dukungan dan kepercayaan mereka kepada kami. Kami
                    selalu berusaha untuk meningkatkan diri dan memberikan produk dan layanan terbaik kepada Anda.

                    Terus ikuti perkembangan kami melalui website ini dan sosial media kami untuk mendapatkan informasi terbaru tentang
                    koleksi terbaru, promosi khusus, dan berita terkini.

                    Terima kasih atas kunjungan Anda. Kami berharap Anda menikmati pengalaman berbelanja di Khadijah Label.

                    Tim Khadijah Label</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->


    <!--Testimonial start-->
    <section class="testimonial small-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="slide-2 testimonial-slider no-arrow">
                        <div>
                            <div class="media">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/frontend/users/author.png') }}" alt="#">
                                    <h5>Muhammad Themy S</h5>
                                    <h6>tahun 2017</h6>
                                </div>
                                <div class="media-body">
                                    <p>Khadijah merupakan salah satu brand lokal yang bergerak di bidang produksi dan penjualan mukena . Brand ini didirikan
                                    oleh seorang pengusaha muda asal Tasikmalaya bernama Muhammad Themy S pada tahun 2017.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial ends-->

    {{-- Start Service Layout --}}
    <x-frontend.home.service-layout />
    {{-- End Service Layout --}}
    @push('scripts')
    @endpush

</x-frontend.master>
