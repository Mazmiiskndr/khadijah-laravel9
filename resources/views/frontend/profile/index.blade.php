<x-frontend.master title="Profil">
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

    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <img src="{{ asset('assets/images/frontend/users/user-female-2.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h5>{{ ucwords($customer->name) }}</h5>
                                <h6>{{ $customer->email }}</h6>
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
                                    <a data-bs-toggle="tab" data-bs-target="#payment" class="nav-link">
                                        Kartu / Rekening Bank
                                    </a>
                                </li>
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
                            {{-- Start Address --}}
                            @livewire('frontend.profile.address',['customer' => $customer])
                            @livewire('frontend.profile.update-address-account')
                            {{-- End Address --}}
                        </div>
                        <div class="tab-pane fade" id="orders">
                            {{-- START LIST TRANSACTION --}}
                            @livewire('frontend.profile.list-transaction')
                            {{-- END LIST TRANSACTION --}}

                        </div>
                        <div class="tab-pane fade" id="payment">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">

                                            {{-- Start Create Rekening Customers --}}
                                            @livewire('frontend.profile.create-cards')
                                            {{-- End Create Rekening Customers --}}

                                            {{-- Start Update Rekening Customers --}}
                                            @livewire('frontend.profile.update-cards')
                                            {{-- End Update Rekening Customers --}}

                                            <div class="address-book-section">
                                                {{-- Start Grid Rekening Customers --}}
                                                @livewire('frontend.profile.grid-cards')
                                                {{-- End Grid Rekening Customers --}}

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
    </section>
    <!--  dashboard section end -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('close-modal', event =>{
        $('#updateCustomerModal').modal('hide');
        $('#createRekeningModal').modal('hide');
        $('#updateRekeningModal').modal('hide');
        $('#updateCustomerAddressModal').modal('hide');
    });
    window.addEventListener('delete-card-show-confirmation', event =>{
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
                Livewire.emit('deleteCard');
            }
        })
    });
    </script>
    @endpush
</x-frontend.master>
