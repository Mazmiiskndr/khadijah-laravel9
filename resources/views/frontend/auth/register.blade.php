<x-frontend.master>
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('index') }}">Beranda</a></li>
                    <li><span>Daftar</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-18 col-lg-12">
                        <h2 class="text-center">Daftar</h2>

                        <div class="form-wrapper">
                            <p>Untuk mengakses informasi tentang daftar belanja Anda, alamat dan preferensi kontak,
                                serta memanfaatkan fitur checkout
                                yang lebih cepat, silakan daftar kan akun Anda sekarang.</p>
                            @livewire('frontend.customer.register')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-frontend.master>
