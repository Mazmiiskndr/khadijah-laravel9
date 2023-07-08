<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header-contact">
                    <ul>
                        <li>Selamat Datang di Khadijah Label</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi Kami: {{ $contact->phone }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <ul class="header-dropdown">
                    @if(Auth::guard('customer')->check())
                    @endif

                    <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                        Akun Saya


                        <ul class="onhover-show-div">
                            @if(Auth::guard('customer')->check())
                                <li>
                                    <a href="{{ route('profile.detail', ['uid' => Auth::guard('customer')->user()->customer_uid ]) }}"><i
                                            class="fas fa-user-gear"></i> Profil</a>
                                </li>
                                <form id="form-logout" method="POST" action="{{ route('customer.logout') }}">
                                    @csrf
                                    <li onclick="logoutButton();">

                                        <a href="#"><i class="fas fa-door-open"></i> Keluar</a>
                                    </li>
                                </form>
                            @else
                            <li><a href="{{ route('customer.login') }}"><i class="fas fa-sign-in-alt"></i> Masuk</a></li>
                            <li><a href="{{ route('customer.register') }}"><i class="fas fa-user-plus"></i> Daftar</a></li>
                            @endif
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
