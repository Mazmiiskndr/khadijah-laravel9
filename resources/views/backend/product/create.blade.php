<x-backend.master title="Tambah Data Produk | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Tambah Data Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.product.index') }}">Produk</a></li>
    <li class="breadcrumb-item">Tambah Data Produk</li>
    @endslot

    <div class="container-fluid">

        <div class="row">
            {{-- START CREATE BUTTON PRODUCT --}}
            @livewire('backend.product.create-product')
            {{-- END CREATE BUTTON PRODUCT --}}
        </div>



    </div>

    @push('scripts')
    @endpush

</x-backend.master>
