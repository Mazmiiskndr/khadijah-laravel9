<!-- footer -->
<footer class="footer-light">
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>KETAHUI TENTANG PRODUK KAMI!</h4>
                                <p>Jangan Pernah Melewatkan Apa Pun Dari Khadijah Label Dengan Mendaftar Ke Situs Kami.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @livewire('frontend.footer.form-subscribe')
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>Tentang Kami</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ asset('assets/images/logo/khadijah-label.png') }}" alt="" width="200"></div>
                        <p>Mukena Khadijah Label adalah merek mukena yang berfokus pada desain eksklusif dan kualitas
                            terbaik. Kami berkomitmen
                            untuk memberikan pengalaman beribadah yang lebih nyaman dan anggun bagi para muslimah.
                            Dengan bahan berkualitas dan
                            desain yang menawan, kami selalu berusaha memberikan yang terbaik untuk para pelanggan kami.
                        </p>
                        {{-- *** TODO: SHARE SOCIAL MEDIA *** --}}
                        <div class="footer-social">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="fa-brands fa-square-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://tiktok.com/" target="_blank"><i class="fa-brands fa-tiktok"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fa-brands fa-square-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Tentang Produk Kami</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">Kualitas Produk</a></li>
                                <li><a href="#">Desain Eksklusif</a></li>
                                <li><a href="#">Produk yang nyaman</a></li>
                                <li><a href="#">Koleksi Terbaru</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Mengapa Memilih Kami</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">Pengiriman & Pengembalian</a></li>
                                <li><a href="#">Belanja Aman</a></li>
                                <li><a href="#">Terpercaya</a></li>
                                <li><a href="#">Produk Berkualitas</a></li>
                                <li><a href="#">Harga Murah</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Informasi Khadijah</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>
                                    @if($contact)
                                    {{ $contact->province ?? "" }}, {{ $contact->city ?? "" }},
                                    {{ $contact->address ?? "" }},
                                    @endif
                                </li>
                                <li><i class="fa fa-phone"></i>Hubungi Kami : {{ $contact->phone ?? "" }}</li>
                                <li><i class="fa fa-envelope"></i>Email: <a href="#">{{ $contact->email ?? "" }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="footer-end">
                        <p class="text-center"><i class="fa fa-copyright" aria-hidden="true"></i>
                        {{ \Carbon\Carbon::now()->format('Y') }} Copyright : <a href="{{ route('index') }}">Khadijah Label</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- footer end -->


<!-- cookie bar start -->
{{-- <div class="cookie-bar">
    <p>We use cookies to improve our site and your shopping experience. By continuing to browse our site you accept
        our cookie policy.</p>
    <a href="javascript:void(0)" class="btn btn-solid btn-xs">accept</a>
    <a href="javascript:void(0)" class="btn btn-solid btn-xs">decline</a>
</div> --}}
<!-- cookie bar end -->


<!--modal popup start-->
{{-- <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body modal1">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-bg">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <div class="offer-content"> <img src="../assets/images/Offer-banner.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                    <h2>newsletter</h2>
                                    <form
                                        action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                        class="auth-form needs-validation" method="post"
                                        id="mc-embedded-subscribe-form1" name="mc-embedded-subscribe-form"
                                        target="_blank">
                                        <div class="form-group mx-sm-3">
                                            <input type="email" class="form-control" name="EMAIL" id="mce-EMAIL"
                                                placeholder="Enter your email" required="required">
                                            <button type="submit" class="btn btn-solid"
                                                id="mc-submit">subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--modal popup end-->

<!-- cart start -->
<div class="addcart_btm_popup" id="fixed_cart_icon">
    <a href="#" class="fixed_cart">
        <i class="fas fa-shopping-cart"></i>
    </a>
</div>
<!-- cart end -->


{{--
<!-- theme setting -->
<div class="theme-settings">
    <ul>
        <li class="demo-li">
            <a href="javascript:void(0)" onclick="openSetting()">
                <div class="setting-sidebar" id="setting-icon">
                    <h5>50+ <br>demo</h5>
                </div>
            </a>
        </li>
        <li class="demo-li">
            <div class="backend-btn"><a target="_blank" href="../back-end/index.html">Admin</a></div>
        </li>
        <li>
            <div class="dark-btn">Dark</div>
        </li>
        <li>
            <div class="rtl-btn">RTL</div>
        </li>
        <li class="input-picker">
            <input id="ColorPicker1" type="color" value="#ff4c3b" name="Background">
        </li>
    </ul>
</div>
<div class="scroll-setting-box">
    <div id="setting_box" class="setting-box">
        <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
        <div class="setting_box_body">
            <div onclick="closeSetting()">
                <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                </div>
            </div>
            <div class="setting-body">
                <div class="setting-title">
                    <div>
                        <img src="{{ asset('assets/images/logo/khadijah-label.png') }}" class="img-fluid" alt="">
                        <h3>50+ <span>demos</span> <br> suit for any type of online store.</h3>
                    </div>
                </div>
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="vegetables-4.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/vegetables-4.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="vegetables-4.html" class="demo-text">
                                    <h4>Vegetables 4 <span>New</span>
                                        <h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="vegetables-5.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/vegetables-5.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="vegetables-5.html" class="demo-text">
                                    <h4>Vegetables 5 <span>New</span>
                                        <h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="gradient.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/gradient.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="gradient.html" class="demo-text">
                                    <h4>gradient<h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="index.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/fashion.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="index.html" class="demo-text">
                                    <h4>fashion</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="fashion-2.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/fashion-2.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="fashion-2.html" class="demo-text">
                                    <h4>fashion 2</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="fashion-3.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/fashion-3.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="fashion-3.html" class="demo-text">
                                    <h4>fashion 3</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="fashion-4.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/fashion-4.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="fashion-4.html" class="demo-text">
                                    <h4>fashion 4</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="fashion-5.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/fashion-5.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="fashion-5.html" class="demo-text">
                                    <h4>fashion 5</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="fashion-6.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/fashion-6.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="fashion-6.html" class="demo-text">
                                    <h4>fashion 6</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="fashion-7.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/fashion-7.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="fashion-7.html" class="demo-text">
                                    <h4>fashion 7</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="furniture.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/furniture.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="furniture.html" class="demo-text">
                                    <h4>furniture</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="furniture-2.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/furniture-2.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="furniture-2.html" class="demo-text">
                                    <h4>furniture 2</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="furniture-3.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/furniture-dark.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="furniture-3.html" class="demo-text">
                                    <h4>furniture dark</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="electronic-1.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/electronics.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="electronic-1.html" class="demo-text">
                                    <h4>electronics</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="electronic-2.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/electronics-2.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="electronic-2.html" class="demo-text">
                                    <h4>electronics 2</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="electronic-3.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/electronics-3.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="electronic-3.html" class="demo-text">
                                    <h4>electronics 3</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="marketplace-demo.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/marketplace.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="marketplace-demo.html" class="demo-text">
                                    <h4>marketplace</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="marketplace-demo-2.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/marketplace-2.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="marketplace-demo-2.html" class="demo-text">
                                    <h4>marketplace 2</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="marketplace-demo-3.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/marketplace-3.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="marketplace-demo-3.html" class="demo-text">
                                    <h4>marketplace 3</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="marketplace-demo-4.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/marketplace-4.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="marketplace-demo-4.html" class="demo-text">
                                    <h4>marketplace 4</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="vegetables.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/vegetables.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="vegetables.html" class="demo-text">
                                    <h4>vegetables</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="vegetables-2.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/vegetables-2.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="vegetables-2.html" class="demo-text">
                                    <h4>vegetables 2</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="vegetables-3.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/vegetables-3.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="vegetables-3.html" class="demo-text">
                                    <h4>vegetables 3</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="jewellery.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/jewellery.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="jewellery.html" class="demo-text">
                                    <h4>jewellery</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="jewellery-2.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/jewellery-2.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="jewellery-2.html" class="demo-text">
                                    <h4>jewellery 2</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="jewellery-3.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/jewellery-3.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="jewellery-3.html" class="demo-text">
                                    <h4>jewellery 3</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="bags.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/bag.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="bags.html" class="demo-text">
                                    <h4>bag</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="watch.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/watch.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="watch.html" class="demo-text">
                                    <h4>watch</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="medical.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/medical.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="medical.html" class="demo-text">
                                    <h4>medical</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="perfume.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/perfume.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="perfume.html" class="demo-text">
                                    <h4>perfume</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="yoga.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/yoga.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="yoga.html" class="demo-text">
                                    <h4>yoga</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="christmas.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/christmas.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="christmas.html" class="demo-text">
                                    <h4>christmas</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="bicycle.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/bicycle.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="bicycle.html" class="demo-text">
                                    <h4>bicycle</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="marijuana.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/marijuana.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="marijuana.html" class="demo-text">
                                    <h4>marijuana</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="gym-product.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/gym.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="gym-product.html" class="demo-text">
                                    <h4>gym</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="tools.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/tools.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="tools.html" class="demo-text">
                                    <h4>tools</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="shoes.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/shoes.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="shoes.html" class="demo-text">
                                    <h4>shoes</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="books.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/books.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="books.html" class="demo-text">
                                    <h4>books</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="kids.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/kids.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="kids.html" class="demo-text">
                                    <h4>kids</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="game.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/game.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="game.html" class="demo-text">
                                    <h4>game</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="beauty.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/beauty.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="beauty.html" class="demo-text">
                                    <h4>beauty</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="left_sidebar-demo.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/left-sidebar.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="left_sidebar-demo.html" class="demo-text">
                                    <h4>left sidebar</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="video-slider.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/video-slider.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="video-slider.html" class="demo-text">
                                    <h4>video slider</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="metro.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/metro.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="metro.html" class="demo-text">
                                    <h4>metro</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="goggles.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/goggles.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="goggles.html" class="demo-text">
                                    <h4>goggles</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="flower.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/flower.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="flower.html" class="demo-text">
                                    <h4>flower</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="light.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/light.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="light.html" class="demo-text">
                                    <h4>light</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="nursery.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/nursery.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="nursery.html" class="demo-text">
                                    <h4>nursery</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="pets.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/pets.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="pets.html" class="demo-text">
                                    <h4>pets</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="video.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/video.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="video.html" class="demo-text">
                                    <h4>video</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="lookbook-demo.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/lookbook.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="lookbook-demo.html" class="demo-text">
                                    <h4>lookbook</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="full-page.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/full-page.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="full-page.html" class="demo-text">
                                    <h4>full page</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="instagram-shop.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/instagram.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="instagram-shop.html" class="demo-text">
                                    <h4>instagram</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center demo-effects">
                            <div class="set-position">
                                <a href="parallax.html" class="layout-container">
                                    <img src="../assets/images/landing-page/demo/parallax.jpg"
                                        class="img-fluid bg-img bg-top" alt="">
                                </a>
                                <a href="parallax.html" class="demo-text">
                                    <h4>parallax</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- theme setting --> --}}


<!-- exit modal popup start-->
{{-- *** TODO: MODAL *** --}}
{{-- <div class="modal fade bd-example-modal-lg theme-modal exit-modal" id="exit_popup" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body modal1">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-bg">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="media">
                                    <img src="../assets/images/stop.png" class="stop img-fluid blur-up lazyload me-3"
                                        alt="">
                                    <div class="media-body text-start align-self-center">
                                        <div>
                                            <h2>wait!</h2>
                                            <h4>We want to give you
                                                <b>10% discount</b>
                                                <span>for your first order</span>
                                            </h4>
                                            <h5>Use discount code at checkout</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Add to cart modal popup end-->
