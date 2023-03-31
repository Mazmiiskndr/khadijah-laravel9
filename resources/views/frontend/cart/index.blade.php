<x-frontend.master>

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Halaman Keranjang</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                            <li class="breadcrumb-item active">Keranjang</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                {{-- *** TODO: CREATE VOUCHERS / COUPONS ***  --}}
                {{-- <div class="col-sm-12">
                    <div class="cart_counter">
                        <div class="countdownholder">
                            Your cart will be expired in<span id="timer"></span> minutes!
                        </div>
                        <a href="checkout.html" class="cart_checkout btn btn-solid btn-xs">check out</a>
                    </div>
                </div> --}}

                {{-- Start Table Cart --}}
                @livewire('frontend.cart.data-table')
                {{-- End Table Cart --}}

            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="{{ route('product.index') }}" class="btn btn-solid">Lanjut Belanja</a></div>
                <div class="col-6"><a href="#" class="btn btn-solid">Check Out</a></div>
            </div>
        </div>
    </section>
    <!--section end-->
    @push('scripts')
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
    @endpush
</x-frontend.master>
