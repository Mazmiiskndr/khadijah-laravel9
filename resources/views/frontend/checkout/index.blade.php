<x-frontend.master title="Pembayaran">

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Halaman Pembayaran</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Pembayaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    {{-- Start Form Checkout --}}
                    @livewire('frontend.checkout.form-checkout')
                    {{-- End Form Checkout --}}
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!--section end-->

    {{-- TODO: --}}
    {{-- @push('scripts')
    <script>
        window.addEventListener('delete-cart-detail-show-confirmation', event =>{
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
    </script>
    @endpush --}}
</x-frontend.master>
