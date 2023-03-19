<x-backend.master title="Laporan Produk | Khadijah">
    @push('styles')
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Laporan Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Laporan Produk</li>
    @endslot

    <div class="container-fluid">
    </div>

    {{-- *** TODO: *** --}}
    {{-- START UPDATE MODAL PROMO --}}
    {{-- @livewire('backend.promo.update-promo') --}}
    {{-- END UPDATE MODAL PROMO --}}
    @push('scripts')
    {{-- *** TODO: *** --}}
    {{-- START DATATABLE --}}
    {{-- <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> --}}
    {{-- END DATATABLE --}}
    {{-- <script>
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
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script> --}}

    @endpush

</x-backend.master>
