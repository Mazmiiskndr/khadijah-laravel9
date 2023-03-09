<x-backend.master title="Promo | Khadijah">
    @push('styles')
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Promo</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Promo</li>
    @endslot

    <div class="container-fluid">
        {{-- *** TODO: DATATABLES PROMO --}}
    </div>

    {{-- *** TODO: PROMO UPDATE **** --}}
    {{-- Include livewire modal --}}
    {{-- @livewire('backend.categories.update-category') --}}
    {{-- @include('livewire.backend.categories.modal-category') --}}

    {{-- Include livewire modal --}}
    @push('scripts')
    {{-- <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        window.addEventListener('close-modal', event =>{
            $('#updateCategoryModal').modal('hide');
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
