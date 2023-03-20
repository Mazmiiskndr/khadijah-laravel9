<x-frontend.master>

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Halaman Daftar</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Daftar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Daftar Akun</h3>
                    @livewire('frontend.customer.register')
                </div>
                <div class="col-lg-4 right-login">
                    <h3>Sudah punya akun?</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Halaman Masuk</h6>
                        <p>Bergabunglah untuk mendapatkan akun gratis di toko kami. Pendaftarannya cepat dan mudah. Dengan memiliki akun,
                            Anda akan
                            dapat memesan barang di toko kami. Ayo mulai belanja, klik tombol Login sekarang!</p><a
                            href="{{ route('customer.login') }}" class="btn btn-solid">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

    @push('scripts')
    @if (session()->has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif
    @endpush
</x-frontend.master>
