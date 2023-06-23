<x-backend.master title="Penjualan | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Penjualan</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Penjualan</li>
    @endslot

    <div class="container-fluid">
        <div class="row">
            <!-- Data Sales-->
            <div class="col-12">

                <div class="card">
                    <div class="card-header pb-0 card-no-border d-flex">
                        <h5>Tabel Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="datatables">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @livewire('backend.sales.datatable-sales')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Sales Ends-->
        </div>
    </div>

    {{-- TODO: --}}
    {{-- Include livewire modal --}}
    {{-- @livewire('backend.sales.update-sales') --}}
    {{-- @include('livewire.backend.sales.modal-sales') --}}

    {{-- Include livewire modal --}}
    @push('scripts')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    {{-- TODO: --}}
    <script>
        // window.addEventListener('close-modal', event =>{
        //     $('#updateSalesModal').modal('hide');
        // });
        // window.addEventListener('delete-show-confirmation', event =>{
        //     Swal.fire({
        //             title: 'Apakah kamu yakin?',
        //             text: "Anda tidak akan dapat mengembalikan data ini!",
        //             icon: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Ya, Hapus!',
        //             cancelButtonText: 'Batal'
        //         }).then((result) => {
        //         if (result.isConfirmed) {
        //             Livewire.emit('deleteConfirmation');
        //         }
        //     })
        // });
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>

    @endpush

</x-backend.master>
