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
        <div class="row">
            {{-- START BUTTON ADD PROMO --}}
            <div class="mb-3">
                @livewire('backend.promo.create-promo')
            </div>
            {{-- END BUTTON ADD PROMO --}}

            <div class="card">
                <div class="card-header pb-0 card-no-border d-flex">
                    <h5>Tabel Promo</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="datatables">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Tipe</th>
                                    <th>Nilai</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- START DATATABLE PROMO --}}
                            @livewire('backend.promo.datatable-promo')
                            {{-- END DATATABLE PROMO --}}
                        </table>
                    </div>
                </div>
            </div>
            <!-- Data Categories Ends-->
        </div>
    </div>

    {{-- START UPDATE MODAL PROMO --}}
    @livewire('backend.promo.update-promo')
    {{-- END UPDATE MODAL PROMO --}}
    @push('scripts')

    {{-- START DATATABLE --}}
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    {{-- END DATATABLE --}}
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
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>

    @endpush

</x-backend.master>
