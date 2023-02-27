<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            {{-- <div class="logo-wrapper">
                <a href="{{ route('backend.dashboard') }}">
                    <img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                </a>
            </div> --}}
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        {{-- <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="notification-slider">
                <div class="d-flex h-100"> <img src="{{ asset('assets/images/giftools.gif') }}" alt="gif">
                    <h6 class="mb-0 f-w-400"><span class="font-primary">Don't Miss Out! </span><span class="f-light">Out
                            new update has been release.</span></h6><i class="icon-arrow-top-right f-light"></i>
                </div>
                <div class="d-flex h-100"><img src="{{ asset('assets/images/giftools.gif') }}" alt="gif">
                    <h6 class="mb-0 f-w-400"><span class="f-light">Something you love is now on sale! </span></h6><a
                        class="ms-1" href="https://1.envato.market/3GVzd" target="_blank">Buy now !</a>
                </div>
            </div>
        </div> --}}
        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                {{-- <li class="language-nav">
                    <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN </span>
                            </div>
                        </div>
                        <div class="more_lang">
                            <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span
                                    class="lang-txt">English<span> (US)</span></span></div>
                            <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span
                                    class="lang-txt">Deutsch</span></div>
                            <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span
                                    class="lang-txt">Español</span></div>
                            <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span
                                    class="lang-txt">Français</span></div>
                            <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span
                                    class="lang-txt">Português<span> (BR)</span></span></div>
                            <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span
                                    class="lang-txt">简体中文</span></div>
                            <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span
                                    class="lang-txt">لعربية <span> (ae)</span></span></div>
                        </div>
                    </div>
                </li> --}}
                <li> <span class="header-search">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#search') }}"></use>
                        </svg></span></li>
                <li class="onhover-dropdown">
                    <svg>
                        <use href="{{ asset('assets/svg/icon-sprite.svg#star') }}"></use>
                    </svg>
                    <div class="onhover-show-div bookmark-flip">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="front">
                                    <h6 class="f-18 mb-0 dropdown-title">Bookmark</h6>
                                    <ul class="bookmark-dropdown">
                                        <li>
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <div class="bookmark-content">
                                                        <div class="bookmark-icon"><i data-feather="file-text"></i>
                                                        </div><span>Forms</span>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <div class="bookmark-content">
                                                        <div class="bookmark-icon"><i data-feather="user"></i></div>
                                                        <span>Profile</span>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <div class="bookmark-content">
                                                        <div class="bookmark-icon"><i data-feather="server"></i></div>
                                                        <span>Tables</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="text-center"><a class="flip-btn f-w-700" id="flip-btn"
                                                href="javascript:void(0)">Add New Bookmark</a></li>
                                    </ul>
                                </div>
                                <div class="back">
                                    <ul>
                                        <li>
                                            <div class="bookmark-dropdown flip-back-content">
                                                <input type="text" placeholder="search...">
                                            </div>
                                        </li>
                                        <li><a class="f-w-700 d-block flip-back" id="flip-back"
                                                href="javascript:void(0)">Back</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="mode">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#moon') }}"></use>
                        </svg>
                    </div>
                </li>
                <li class="cart-nav onhover-dropdown">
                    <div class="cart-box">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                        </svg><span class="badge rounded-pill badge-success">2</span>
                    </div>
                    <div class="cart-dropdown onhover-show-div">
                        <h6 class="f-18 mb-0 dropdown-title">Cart</h6>
                        <ul>
                            <li>
                                <div class="media"><img class="img-fluid b-r-5 me-3 img-60"
                                        src="{{ asset('assets/images/other-images/cart-img.jpg') }}" alt="">
                                    <div class="media-body"><span>Furniture Chair for Home</span>
                                        <div class="qty-box">
                                            <div class="input-group"><span class="input-group-prepend">
                                                    <button class="btn quantity-left-minus" type="button"
                                                        data-type="minus" data-field="">-</button></span>
                                                <input class="form-control input-number" type="text" name="quantity"
                                                    value="1"><span class="input-group-prepend">
                                                    <button class="btn quantity-right-plus" type="button"
                                                        data-type="plus" data-field="">+</button></span>
                                            </div>
                                        </div>
                                        <h6 class="font-primary">$500</h6>
                                    </div>
                                    <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><img class="img-fluid b-r-5 me-3 img-60"
                                        src="{{ asset('assets/images/other-images/cart-img.jpg') }}" alt="">
                                    <div class="media-body"><span>Furniture Chair for Home</span>
                                        <div class="qty-box">
                                            <div class="input-group"><span class="input-group-prepend">
                                                    <button class="btn quantity-left-minus" type="button"
                                                        data-type="minus" data-field="">-</button></span>
                                                <input class="form-control input-number" type="text" name="quantity"
                                                    value="1"><span class="input-group-prepend">
                                                    <button class="btn quantity-right-plus" type="button"
                                                        data-type="plus" data-field="">+</button></span>
                                            </div>
                                        </div>
                                        <h6 class="font-primary">$500.00</h6>
                                    </div>
                                    <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="total">
                                <h6 class="mb-0">Order Total : <span class="f-right">$1000.00</span></h6>
                            </li>
                            <li class="text-center"><a class="d-block mb-3 view-cart f-w-700" href="#">Go to your
                                    cart</a><a class="btn btn-primary view-checkout" href="#">Checkout</a></li>
                        </ul>
                    </div>
                </li>
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg#notification') }}"></use>
                        </svg><span class="badge rounded-pill badge-secondary">4 </span>
                    </div>
                    <div class="onhover-show-div notification-dropdown">
                        <h6 class="f-18 mb-0 dropdown-title">Notitications </h6>
                        <ul>
                            <li class="b-l-primary border-4">
                                <p>Delivery processing <span class="font-danger">10 min.</span></p>
                            </li>
                            <li class="b-l-success border-4">
                                <p>Order Complete<span class="font-success">1 hr</span></p>
                            </li>
                            <li class="b-l-secondary border-4">
                                <p>Tickets Generated<span class="font-secondary">3 hr</span></p>
                            </li>
                            <li class="b-l-warning border-4">
                                <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                            </li>
                            <li><a class="f-w-700" href="#">Check all</a></li>
                        </ul>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="media profile-media"><img class="b-r-10"
                            src="{{ asset('assets/images/users/default.png') }}" alt="Images" width="35">
                        <div class="media-body"><span>{{ Auth::user()->name }}</span>
                            <p class="mb-0 font-roboto">{{ Auth::user()->email }} <i
                                    class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                        <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                        <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                        <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>

                        <li>
                            <form id="form-logout" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" onclick="logoutButton();">
                                    <i data-feather="log-out"> </i>
                                    <span>Keluar</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

@push('scripts')
<script>
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
</script>
@endpush
