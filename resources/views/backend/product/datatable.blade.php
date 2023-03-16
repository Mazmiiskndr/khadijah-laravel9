<x-backend.master title="Tabel Produk | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Tabel Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Tabel Produk</li>
    @endslot

    <div class="container-fluid">
        <div class="row">
            {{-- <div class="mb-3">
                @livewire('backend.product.create-product')
            </div> --}}
            <div class="card">
                <div class="card-header pb-0 card-no-border d-flex">
                    <h5>Tabel Produk</h5>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="datatables">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Ukuran</th>
                                    <th>Tgl dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @livewire('backend.product.datatable-product')
                        </table>
                    </div>
                </div>
            </div>
            <!-- Data Product Ends-->
        </div>
    </div>

    @push('scripts')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>

    @endpush

</x-backend.master>
