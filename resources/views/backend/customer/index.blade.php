<x-backend.master title="Kategori | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Kategori</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Kategori</li>
    @endslot

    <div class="container-fluid">
        <div class="row">
            <div class="mb-3">
                @livewire('backend.customer.create-customer')
            </div>
            <div class="card">
                <div class="card-header pb-0 card-no-border d-flex">
                    <h5>Data Kategori</h5>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="datatables">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Nama Customer</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @livewire('backend.customer.datatable-customer')
                        </table>
                    </div>
                </div>
            </div>
            <!-- Data Customer Ends-->
        </div>
    </div>
    {{-- *** TODO: *** --}}
    {{-- Include livewire modal --}}
    {{-- @livewire('backend.customer.update-customer') --}}
    {{-- @include('livewire.backend.customer.modal-customer') --}}

    {{-- Include livewire modal --}}
    @push('scripts')
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script>
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
