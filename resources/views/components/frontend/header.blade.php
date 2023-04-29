<header>
    <div class="mobile-fix-option"></div>
    {{-- Start Top Header --}}
    <x-frontend.top-header />
    {{-- End Top Header --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    {{-- Start Menu Left --}}
                    <x-frontend.menu-left />
                    {{-- End Menu Left --}}
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Kembali<i class="fa fa-angle-right ps-2"
                                                aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="{{ route('index') }}">Beranda</a></li>
                                    <li><a href="{{ route('product.index') }}">Produk</a></li>
                                    <li><a href="{{ route('gallery.index') }}">Galeri</a></li>
                                    <li><a href="{{ route('about.index') }}">Tentang</a></li>
                                    <li><a href="{{ route('contact.index') }}">Kontak</a></li>
                                    <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                                    {{-- <li class="mega" id="hover-cls">
                                        <a href="#">feature <div class="lable-nav">new</div></a>
                                        <ul class="mega-menu full-mega-menu">
                                            <li>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>invoice template</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a target="_blank"
                                                                                href="invoice-1.html">invoice
                                                                                1</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-2.html">invoice
                                                                                2</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-3.html">invoice
                                                                                3</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-4.html">invoice
                                                                                4</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-5.html">invoice
                                                                                5</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title mt-2">
                                                                    <h5>elements</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="elements.html">
                                                                                elements page<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i>
                                                                            </a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>email template</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/welcome.html">welcome</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/new-product-announcement.html">announcement</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/abandonment-email.html">abandonment</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/offer.html">offer</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/offer-2.html">offer
                                                                                2</a></li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/product-review.html">review</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/featured-products.html">featured
                                                                                product</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>email template</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/black-friday.html">black
                                                                                friday</a></li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/christmas.html">christmas</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/cyber-monday.html">cyber-monday</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/flash-sale.html">flash
                                                                                sale</a></li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/email-order-success.html">order
                                                                                success</a></li>
                                                                        <li><a target="_blank"
                                                                                href="../email-template/email-order-success-two.html">order
                                                                                success 2</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>cookie bar</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="index.html">bottom<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                        <li><a href="fashion-4.html">bottom left</a>
                                                                        </li>
                                                                        <li><a href="bicycle.html">bottom right</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title mt-2">
                                                                    <h5>search</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="marketplace-demo-2.html">ajax
                                                                                search<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>model</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="index.html">Newsletter</a></li>
                                                                        <li><a href="index.html">exit<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                        <li><a href="christmas.html">christmas</a>
                                                                        </li>
                                                                        <li><a href="furniture-3.html">black
                                                                                friday</a></li>
                                                                        <li><a href="fashion-4.html">cyber
                                                                                monday</a></li>
                                                                        <li><a href="marketplace-demo-3.html">new
                                                                                year</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>add to cart</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="nursery.html">cart modal
                                                                                popup</a></li>
                                                                        <li><a href="vegetables.html">qty. counter
                                                                                <i class="fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                        <li><a href="bags.html">cart top</a></li>
                                                                        <li><a href="shoes.html">cart bottom</a>
                                                                        </li>
                                                                        <li><a href="watch.html">cart left</a></li>
                                                                        <li><a href="tools.html">cart right</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="../assets/images/menu-banner.jpg"
                                                                class="img-fluid mega-img">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">shop</a>
                                        <ul>
                                            <li><a href="category-page(vegetables).html">tab style<span
                                                        class="new-tag">new</span></a></li>
                                            <li><a href="category-page(top-filter).html">top filter</a></li>
                                            <li><a href="category-page(modern).html">modern</a></li>
                                            <li><a href="category-page.html">left sidebar</a></li>
                                            <li><a href="category-page(right).html">right sidebar</a></li>
                                            <li><a href="category-page(no-sidebar).html">no sidebar</a></li>
                                            <li><a href="category-page(sidebar-popup).html">sidebar popup</a>
                                            </li>
                                            <li><a href="category-page(metro).html">metro</a></li>
                                            <li><a href="category-page(full-width).html">full width</a></li>
                                            <li><a href="category-page(infinite-scroll).html">infinite
                                                    scroll</a></li>
                                            <li><a href=category-page(3-grid).html>three grid</a></li>
                                            <li><a href="category-page(6-grid).html">six grid</a></li>
                                            <li><a href="category-page(list-view).html">list view</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">product</a>
                                        <ul>
                                            <li><a href="product-page(360-view).html">360 view <span
                                                        class="new-tag">new</span></a></li>
                                            <li><a href="product-page(video-thumbnail).html">video
                                                    thumbnail<span class="new-tag">new</span></a></li>
                                            <li>
                                                <a href="#">sidebar</a>
                                                <ul>
                                                    <li><a href="product-page.html">left sidebar</a></li>
                                                    <li><a href="product-page(right-sidebar).html">right
                                                            sidebar</a>
                                                    </li>
                                                    <li><a href="product-page(no-sidebar).html">no sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">thumbnail image</a>
                                                <ul>
                                                    <li><a href="product-page(left-image).html">left image</a>
                                                    </li>
                                                    <li><a href="product-page(right-image).html">right image</a>
                                                    </li>
                                                    <li><a href="product-page(image-outside).html">image
                                                            outside</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">three column</a>
                                                <ul>
                                                    <li><a href="product-page(3-col-left).html">thumbnail
                                                            left</a>
                                                    </li>
                                                    <li><a href="product-page(3-col-right).html">thumbnail
                                                            right</a>
                                                    </li>
                                                    <li><a href="product-page(3-column).html">thubnail
                                                            bottom</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="product-page(4-image).html">four image</a></li>
                                            <li><a href="product-page(sticky).html">sticky</a></li>
                                            <li><a href="product-page(accordian).html">accordian</a></li>
                                            <li><a href="product-page(bundle).html">bundle</a></li>
                                            <li><a href="product-page(image-swatch).html">image swatch </a></li>
                                            <li><a href="product-page(vertical-tab).html">vertical tab</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li>
                                                <a href="#">vendor</a>
                                                <ul>
                                                    <li><a href="vendor-dashboard.html">vendor dashboard</a>
                                                    </li>
                                                    <li><a href="vendor-profile.html">vendor profile</a></li>
                                                    <li><a href="become-vendor.html">become vendor</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">account</a>
                                                <ul>
                                                    <li><a href="wishlist.html">wishlist</a></li>
                                                    <li><a href="cart.html">cart</a></li>
                                                    <li><a href="dashboard.html">Dashboard</a></li>
                                                    <li><a href="login.html">login</a></li>
                                                    <li><a href="register.html">register</a></li>
                                                    <li><a href="contact.html">contact</a></li>
                                                    <li><a href="forget_pwd.html">forget password</a></li>
                                                    <li><a href="profile.html">profile</a></li>
                                                    <li><a href="checkout.html">checkout</a></li>
                                                    <li><a href="order-success.html">order success</a></li>
                                                    <li><a href="order-tracking.html">order tracking<span
                                                                class="new-tag">new</span></a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">portfolio</a>
                                                <ul>
                                                    <li><a href="">grid</a>
                                                        <ul>
                                                            <li><a href="grid-2-col.html">grid
                                                                    2</a></li>
                                                            <li><a href="grid-3-col.html">grid
                                                                    3</a></li>
                                                            <li><a href="grid-4-col.html">grid
                                                                    4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="">masonry</a>
                                                        <ul>
                                                            <li><a href="masonary-2-grid.html">grid 2</a></li>
                                                            <li><a href="masonary-3-grid.html">grid 3</a></li>
                                                            <li><a href="masonary-4-grid.html">grid 4</a></li>
                                                            <li><a href="masonary-fullwidth.html">full width</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="about-page.html">about us</a></li>
                                            <li><a href="search.html">search</a></li>
                                            <li><a href="review.html">review</a>
                                            </li>
                                            <li>
                                                <a href="#">compare</a>
                                                <ul>
                                                    <li><a href="compare.html">compare</a></li>
                                                    <li><a href="compare-2.html">compare-2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="collection.html">collection</a></li>
                                            <li><a href="lookbook.html">lookbook</a></li>
                                            <li><a href="sitemap.html">site map</a>
                                            </li>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="coming-soon.html">coming soon</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">blog</a>
                                        <ul>
                                            <li><a href="blog-page.html">left sidebar</a></li>
                                            <li><a href="blog(right-sidebar).html">right sidebar</a></li>
                                            <li><a href="blog(no-sidebar).html">no sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                        <div>
                            @if(Auth::guard('customer')->check())
                            @livewire('frontend.header.cart')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    window.addEventListener('delete-cart-show-confirmation', event =>{
        Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                Livewire.emit('deleteCart');
            }
        })
    });
    function logoutButton() {
        // var form = $(this).closest("form");
        event.preventDefault();
        // console.log(id);
        Swal.fire({
            title: 'Anda yakin ingin keluar?',
            text: "Anda tidak akan dapat mengakses data lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector("#form-logout").submit();
            }
        });
    }
    // function logoutButtonMobile() {
    //     event.preventDefault();
    //     Swal.fire({
    //         title: 'Anda yakin ingin keluar?',
    //         text: "Anda tidak akan dapat mengakses data lagi!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Ya, Keluar!',
    //         cancelButtonText: 'Tidak!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             document.querySelector("#form-logout").submit();
    //         }
    //     });
    // }
</script>
@endpush
