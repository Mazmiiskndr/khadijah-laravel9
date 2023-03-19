<x-backend.master title="Tambah Data Produk | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    {{-- TODO: UPLOAD FILE --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}"> --}}
    @endpush

    @slot('breadcrumbTitle')
    <h3>Tambah Data Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.product.index') }}">Produk</a></li>
    <li class="breadcrumb-item">Tambah Data Produk</li>
    @endslot

    <div class="container-fluid">
        {{-- TODO: --}}
        <div class="row">
            {{-- START CREATE BUTTON PRODUCT --}}
            @livewire('backend.product.create-product')
            {{-- END CREATE BUTTON PRODUCT --}}
        </div>



    </div>

    @push('scripts')
    {{-- <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>

    <script>
        window.addEventListener('close-modal', event =>{
            $('#createPromoModal').modal('hide');
            $('#updatePromoModal').modal('hide');
        });
        window.addEventListener('delete-show-confirmation', event =>{
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
                    Livewire.emit('deleteConfirmation');
                }
            })
        });
    </script> --}}
    @endpush

</x-backend.master>
