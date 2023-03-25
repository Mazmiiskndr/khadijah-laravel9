<div class="row g-4">

    @if($rekeningCustomers->isEmpty())
    <div class="col-12">
        <div class="alert alert-warning">
            <h5 class="text-center">Belum ada rekening yang terdaftar</h5>
        </div>
    </div>
    @else
    @foreach ($rekeningCustomers as $rekening)
        <div class="select-box active col-xl-4 col-md-6">
            <div class="address-box">
                <div class="bank-logo">
                    @php
                        $provider = str()->upper($rekening->provider);
                    @endphp
                    {{-- BCA --}}
                    @if ($provider == 'BCA')
                    <img src="{{ asset('assets/images/logo-payment/bca.png') }}" class="bank-logo">

                    {{-- MANDIRI --}}
                    @elseif ($provider == 'MANDIRI')
                    <img src="{{ asset('assets/images/logo-payment/mandiri.png') }}" class="bank-logo">

                    {{-- BNI --}}
                    @elseif ($provider == 'BNI')
                    <img src="{{ asset('assets/images/logo-payment/bni.png') }}" class="bank-logo">

                    {{-- BRI --}}
                    @elseif ($provider == 'BRI')
                        <img src="{{ asset('assets/images/logo-payment/bri.png') }}" class="bank-logo">

                    {{-- DANA --}}
                    @elseif ($provider == 'DANA')
                    <img src="{{ asset('assets/images/logo-payment/dana.png') }}" class="bank-logo">

                    {{-- GOPAY --}}
                    @elseif ($provider == 'GOPAY')
                    <img src="{{ asset('assets/images/logo-payment/gopay.png') }}" class="bank-logo">

                    {{-- OVO --}}
                    @elseif ($provider == 'OVO')
                    <img src="{{ asset('assets/images/logo-payment/ovo.png') }}" class="bank-logo">

                    {{-- ALFAMART --}}
                    @elseif ($provider == 'ALFAMART')
                    <img src="{{ asset('assets/images/logo-payment/alfamart.png') }}" class="bank-logo">

                    {{-- INDOMART --}}
                    @elseif ($provider == 'INDOMART')
                    <img src="{{ asset('assets/images/logo-payment/indomart.png') }}" class="bank-logo">

                    {{-- ELSE --}}
                    @else
                        <img src="" class="bank-logo" alt="LOGO BANK / PEMBAYARAN">
                    @endif

                </div>
                <div class="card-number">
                    <h6>Nomor Rekening / Pembayaran </h6>
                    <h5>{{ $rekening->rekening_number }}</h5>
                </div>
                <div class="name-validity">
                    <div class="left">
                        <h6>Nama Rekening / Pembayaran</h6>
                        <h5>{{ $rekening->rekening_name }}</h5>
                    </div>
                    <div class="right">
                        <h6>Pembayaran</h6>
                        <h5>{{ str()->upper($rekening->provider) }}</h5>
                    </div>
                </div>
                <div class="bottom">
                    {{-- TODO: EDIT --}}
                    <a href="javascript:void(0)" class="bottom_btn"
                    wire:click="getRekening({{ $rekening->id }})" data-bs-toggle="modal" data-bs-target="#updateRekeningModal">Edit</a>
                    <a href="javascript:void(0)" class="bottom_btn"
                    wire:click="deleteConfirmation({{ $rekening->id }})">Hapus</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    @if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        })

    </script>
    @endif
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
</div>
