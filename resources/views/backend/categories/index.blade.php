<x-backend.master title="Kategori | Khadijah">
    @push('styles')
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
            <!-- Add Categories-->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header pb-0 card-no-border d-flex">
                        <h5>Tambah Data Kategori</h5>
                    </div>
                    <div class="card-body">
                        @livewire('backend.categories.create-category')
                    </div>
                </div>
            </div>
            <!-- Add Categories Ends-->
            <!-- Data Categories-->
            <div class="col-sm-8">

                <div class="card">
                    <div class="card-header pb-0 card-no-border d-flex">
                        <h5>Tabel Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="datatables">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    @livewire('backend.categories.datatable-category')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Categories Ends-->
        </div>
    </div>

    {{-- Include livewire modal --}}
    @livewire('backend.categories.update-category')
    {{-- @include('livewire.backend.categories.modal-category') --}}

    {{-- Include livewire modal --}}
    @push('scripts')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
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
    </script>

    @endpush

</x-backend.master>
