<div class="sidebar-wrapper" sidebar-layout="fill-svg">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('backend.dashboard')}}">
                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/khadijah-label.png') }}" alt="Logo" width="150">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('backend.dashboard')}}">
                <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    {{-- START SIDEBAR DASHBOARD --}}
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('backend.dashboard') }}">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                        </svg>
                        <span>Dashboard</span></a>
                    </li>
                    {{-- END SIDEBAR DASHBOARD --}}

                    {{-- START SIDEBAR SUBMENU PRODUK --}}
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-ecommerce') }}"></use>
                            </svg><span>Produk</span>
                            <label class="badge badge-light-primary">4</label>
                        </a>
                        <ul class="sidebar-submenu" style="display: block;">
                            <li>
                                <a href="{{ route('backend.categories.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-others') }}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-others') }}"></use>
                                    </svg>
                                    <span>Kategori</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.product.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-bonus-kit') }}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-bonus-kit') }}"></use>
                                    </svg>
                                    <span>Grid</span>

                                </a>
                            </li>

                            <li>
                                <a href="{{ route('backend.product.datatable') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-table') }}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-table') }}"></use>
                                    </svg>
                                    <span>Tabel</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.product.gallery') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-gallery') }}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-gallery') }}"></use>
                                    </svg>
                                    <span>Galeri</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    {{-- END SIDEBAR SUBMENU PRODUK --}}

                    {{-- START SIDEBAR PELANGGAN --}}
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('backend.customer.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg>
                            <span>Pelanggan</span></a>
                    </li>
                    {{-- END SIDEBAR PELANGGAN --}}

                    {{-- START SIDEBAR PROMO --}}
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('backend.promo.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-task') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-task') }}"></use>
                            </svg>
                            <span>Promo</span></a>
                    </li>
                    {{-- END SIDEBAR PROMO --}}

                    {{-- START SIDEBAR SUBMENU LAPORAN --}}
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-charts') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-charts') }}"></use>
                            </svg><span>Laporan</span>
                            <label class="badge badge-light-primary">3</label>
                        </a>
                        <ul class="sidebar-submenu" style="display: block;">
                            <li>
                                <a href="{{ route('backend.report-product.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-ecommerce') }}"></use>
                                    </svg>
                                    <span>Produk</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    {{-- END SIDEBAR SUBMENU LAPORAN --}}

                    {{-- *** TODO: *** --}}


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
