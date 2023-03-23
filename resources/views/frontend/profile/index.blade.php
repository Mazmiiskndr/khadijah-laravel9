<x-frontend.master title="Profil | Khadijah Label">
    @push('styles')

    @endpush
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Profil</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

{{-- *** TODO: *** --}}


<!--  dashboard section start -->
<section class="dashboard-section section-b-space user-dashboard-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="dashboard-sidebar">
                    <div class="profile-top">
                        <div class="profile-image">
                            @if ($customer->gender == null)
                            <img src="{{ asset('assets/images/frontend/users/user-male-1.png') }}" alt="" class="img-fluid">
                            @elseif ($customer->gender == "Perempuan")
                            <img src="{{ asset('assets/images/frontend/users/user-female-1.png') }}" alt="" class="img-fluid">
                            @else
                            <img src="{{ asset('assets/images/frontend/users/user-male-1.png') }}" alt="" class="img-fluid">
                            @endif
                        </div>
                        <div class="profile-detail">
                            <h5>{{ ucwords($customer->name) }}</h5>
                            <h6>{{  $customer->email  }}</h6>
                        </div>
                    </div>
                    <div class="faq-tab">
                        <ul class="nav nav-tabs" id="top-tab" role="tablist">
                            <li class="nav-item">
                                <a data-bs-toggle="tab" data-bs-target="#info" class="nav-link active">
                                    Info Akun
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="tab" data-bs-target="#address" class="nav-link">
                                    Buku Alamat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="tab" data-bs-target="#orders" class="nav-link">
                                    Transaksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="tab" data-bs-target="#wishlist" class="nav-link">
                                    Favorit
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="tab" data-bs-target="#payment" class="nav-link">
                                    Kartu / Rekening Bank
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-bs-toggle="tab" data-bs-target="#profile" class="nav-link">
                                    Detail Akun
                                </a>
                            </li>
                            {{-- *** TODO: SECURITY *** --}}
                            {{-- <li class="nav-item">
                                <a data-bs-toggle="tab" data-bs-target="#security" class="nav-link">
                                    Security
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="" class="nav-link" onclick="logoutButton();">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="faq-content tab-content" id="top-tabContent">
                    <div class="tab-pane fade show active" id="info">
                        <div class="counter-section">
                            {{-- Start Dashboard Account --}}
                            @livewire('frontend.profile.dashboard-account', ['customer' => $customer])
                            {{-- End Dashboard Account --}}
                            <div class="box-account box-info">

                                <div class="box-head">
                                    <h4>Informasi Akun</h4>
                                </div>
                                {{-- Start Information Account --}}
                                @livewire('frontend.profile.information-account',['customer' => $customer])
                                @livewire('frontend.profile.update-account')
                                {{-- End Information Account --}}

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-0">
                                    <div class="card-body">
                                        <div class="top-sec">
                                            <h3>Address Book</h3>
                                            <a href="#" class="btn btn-sm btn-solid">+ add new</a>
                                        </div>
                                        <div class="address-book-section">
                                            <div class="row g-4">
                                                <div class="select-box active col-xl-4 col-md-6">
                                                    <div class="address-box">
                                                        <div class="top">
                                                            <h6>mark jecno <span>home</span></h6>
                                                        </div>
                                                        <div class="middle">
                                                            <div class="address">
                                                                <p>549 Sulphur Springs Road</p>
                                                                <p>Downers Grove, IL</p>
                                                                <p>60515</p>
                                                            </div>
                                                            <div class="number">
                                                                <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="bottom">
                                                            <a href="javascript:void(0)" data-bs-target="#edit-address"
                                                                data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                            <a href="#" class="bottom_btn">remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="select-box col-xl-4 col-md-6">
                                                    <div class="address-box">
                                                        <div class="top">
                                                            <h6>mark jecno <span>office</span></h6>
                                                        </div>
                                                        <div class="middle">
                                                            <div class="address">
                                                                <p>549 Sulphur Springs Road</p>
                                                                <p>Downers Grove, IL</p>
                                                                <p>60515</p>
                                                            </div>
                                                            <div class="number">
                                                                <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="bottom">
                                                            <a href="javascript:void(0)" data-bs-target="#edit-address"
                                                                data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                            <a href="#" class="bottom_btn">remove</a>
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
                    <div class="tab-pane fade" id="orders">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-sm">
                                        <div class="top-sec">
                                            <h3>My Orders</h3>
                                        </div>
                                        <div class="table-responsive-xl">
                                            <table class="table cart-table order-table">
                                                <thead>
                                                    <tr class="table-head">
                                                        <th scope="col">image</th>
                                                        <th scope="col">Order Id</th>
                                                        <th scope="col">Product Details</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/1.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125021</span>
                                                        </td>
                                                        <td>
                                                            <span class="fs-6">Purple polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-success custom-badge">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/2.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125367</span>
                                                        </td>
                                                        <td>
                                                            <span class="fs-6">Sleevless white top</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-danger custom-badge">Pending</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/27.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>#125948</p>
                                                        </td>
                                                        <td>
                                                            <p class="fs-6">multi color polo tshirt</p>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-success custom-badge">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <p class="theme-color fs-6">$49.54</p>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/28.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>#127569</p>
                                                        </td>
                                                        <td>
                                                            <p class="fs-6">Candy red solid tshirt</p>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-success custom-badge">Shipped</span>
                                                        </td>
                                                        <td>
                                                            <p class="theme-color fs-6">$49.54</p>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/33.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>#125753</p>
                                                        </td>
                                                        <td>
                                                            <p class="fs-6">multicolored polo tshirt</p>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-secondary custom-badge">Canceled</span>
                                                        </td>
                                                        <td>
                                                            <p class="theme-color fs-6">$49.54</p>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/34.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125021</span>
                                                        </td>
                                                        <td>
                                                            <span class="fs-6">Men's Sweatshirt</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge rounded-pill bg-secondary custom-badge">Canceled</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-eye text-theme"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="wishlist">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-sm">
                                        <div class="top-sec">
                                            <h3>My Wishlist</h3>
                                        </div>
                                        <div class="table-responsive-xl">
                                            <table class="table cart-table wishlist-table">
                                                <thead>
                                                    <tr class="table-head">
                                                        <th scope="col">image</th>
                                                        <th scope="col">Order Id</th>
                                                        <th scope="col">Product Details</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/1.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125021</span>
                                                        </td>
                                                        <td>
                                                            <span>Purple polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/2.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="mt-0">#125367</span>
                                                        </td>
                                                        <td>
                                                            <span>Sleevless white top</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/27.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125948</span>
                                                        </td>
                                                        <td>
                                                            <span>multi color polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/28.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#127569</span>
                                                        </td>
                                                        <td>
                                                            <span>Candy red solid tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/33.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125753</span>
                                                        </td>
                                                        <td>
                                                            <span>multicolored polo tshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="../assets/images/pro3/34.jpg"
                                                                    class="blur-up lazyloaded" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span>#125021</span>
                                                        </td>
                                                        <td>
                                                            <span>Men's Sweatshirt</span>
                                                        </td>
                                                        <td>
                                                            <span class="theme-color fs-6">$49.54</span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-xs btn-solid">
                                                                Move to Cart
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payment">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-0">
                                    <div class="card-body">
                                        <div class="top-sec">
                                            <h3>Saved Cards</h3>
                                            <a href="#" class="btn btn-sm btn-solid">+ add new</a>
                                        </div>
                                        <div class="address-book-section">
                                            <div class="row g-4">
                                                <div class="select-box active col-xl-4 col-md-6">
                                                    <div class="address-box">
                                                        <div class="bank-logo">
                                                            <img src="../assets/images/bank-logo.png" class="bank-logo">
                                                            <img src="../assets/images/visa.png" class="network-logo">
                                                        </div>
                                                        <div class="card-number">
                                                            <h6>Card Number</h6>
                                                            <h5>6262 6126 2112 1515</h5>
                                                        </div>
                                                        <div class="name-validity">
                                                            <div class="left">
                                                                <h6>name on card</h6>
                                                                <h5>Mark Jecno</h5>
                                                            </div>
                                                            <div class="right">
                                                                <h6>validity</h6>
                                                                <h5>XX/XX</h5>
                                                            </div>
                                                        </div>
                                                        <div class="bottom">
                                                            <a href="javascript:void(0)" data-bs-target="#edit-address"
                                                                data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                            <a href="#" class="bottom_btn">remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="select-box col-xl-4 col-md-6">
                                                    <div class="address-box">
                                                        <div class="bank-logo">
                                                            <img src="../assets/images/bank-logo1.png"
                                                                class="bank-logo">
                                                            <img src="../assets/images/visa.png" class="network-logo">
                                                        </div>
                                                        <div class="card-number">
                                                            <h6>Card Number</h6>
                                                            <h5>6262 6126 2112 1515</h5>
                                                        </div>
                                                        <div class="name-validity">
                                                            <div class="left">
                                                                <h6>name on card</h6>
                                                                <h5>Mark Jecno</h5>
                                                            </div>
                                                            <div class="right">
                                                                <h6>validity</h6>
                                                                <h5>XX/XX</h5>
                                                            </div>
                                                        </div>
                                                        <div class="bottom">
                                                            <a href="javascript:void(0)" data-bs-target="#edit-address"
                                                                data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                            <a href="#" class="bottom_btn">remove</a>
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
                    <div class="tab-pane fade" id="profile">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-0">
                                    <div class="card-body">
                                        <div class="dashboard-box">
                                            <div class="dashboard-title">
                                                <h4>Detail Informasi Akun</h4>
                                                <a class="edit-link" href="#">edit</a>
                                            </div>
                                            <div class="dashboard-detail">
                                                <ul>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Nama</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Email</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->email }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>No. Telepon / WhatsApp</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->phone }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Jenis Kelamin</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->gender }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Provinsi</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $provinceCustomer ?? "-" }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Kota / Kabupaten</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $cityCustomer ?? "-" }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Kecamatan</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $districtCustomer ?? "-" }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Alamat</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->address ?? "-" }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Kode Pos</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->postal_cod ?? "-" }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Tanggal Daftar</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ date('d-M-Y',strtotime($customer->registration_date))  }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="dashboard-title mt-lg-5 mt-3">
                                                <h4>Akses Masuk</h4>
                                                <a class="edit-link" href="#">edit</a>
                                            </div>
                                            <div class="dashboard-detail">
                                                <ul>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Email</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->email }}

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>No. Telepon / WhatsApp</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->phone }}

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Jenis Kelamin</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>{{ $customer->gender }}

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Kata Sandi</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>*******
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- *** TODO: SECURITY *** --}}
                    {{-- <div class="tab-pane fade" id="security">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-0">
                                    <div class="card-body">
                                        <div class="dashboard-box">
                                            <div class="dashboard-title">
                                                <h4>settings</h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <div class="account-setting">
                                                    <h5>Notifications</h5>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios"
                                                                    id="exampleRadios1" value="option1" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    Allow Desktop Notifications
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios"
                                                                    id="exampleRadios2" value="option2">
                                                                <label class="form-check-label" for="exampleRadios2">
                                                                    Enable Notifications
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios"
                                                                    id="exampleRadios3" value="option3">
                                                                <label class="form-check-label" for="exampleRadios3">
                                                                    Get notification for my own activity
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios"
                                                                    id="exampleRadios4" value="option4">
                                                                <label class="form-check-label" for="exampleRadios4">
                                                                    DND
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="account-setting">
                                                    <h5>deactivate account</h5>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios1"
                                                                    id="exampleRadios4" value="option4" checked>
                                                                <label class="form-check-label" for="exampleRadios4">
                                                                    I have a privacy concern
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios1"
                                                                    id="exampleRadios5" value="option5">
                                                                <label class="form-check-label" for="exampleRadios5">
                                                                    This is temporary
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios1"
                                                                    id="exampleRadios6" value="option6">
                                                                <label class="form-check-label" for="exampleRadios6">
                                                                    other
                                                                </label>
                                                            </div>
                                                            <button type="button"
                                                                class="btn btn-solid btn-xs">Deactivate
                                                                Account</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="account-setting">
                                                    <h5>Delete account</h5>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios3"
                                                                    id="exampleRadios7" value="option7" checked>
                                                                <label class="form-check-label" for="exampleRadios7">
                                                                    No longer usable
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios3"
                                                                    id="exampleRadios8" value="option8">
                                                                <label class="form-check-label" for="exampleRadios8">
                                                                    Want to switch on other account
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="radio_animated form-check-input"
                                                                    type="radio" name="exampleRadios3"
                                                                    id="exampleRadios9" value="option9">
                                                                <label class="form-check-label" for="exampleRadios9">
                                                                    other
                                                                </label>
                                                            </div>
                                                            <button type="button" class="btn btn-solid btn-xs">Delete
                                                                Account</button>
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
                </div>
            </div>
        </div>
    </div>
</section>
<!--  dashboard section end -->
@push('scripts')
<script>
    window.addEventListener('close-modal', event =>{
        $('#updateCustomerModal').modal('hide');
    });
</script>
@endpush
</x-frontend.master>

