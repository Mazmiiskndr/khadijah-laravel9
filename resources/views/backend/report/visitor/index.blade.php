<x-backend.master title="Laporan Pengunjung | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Laporan Pengunjung</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Laporan Pengunjung</li>
    @endslot

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header pb-0 card-no-border d-flex">
                    <h5>Tabel Pengunjung</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="datatables">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Pengguna</th>
                                    <th>IP Address</th>
                                </tr>
                            </thead>
                            @livewire('backend.report.visitor.data-table')
                        </table>
                    </div>
                </div>
            </div>
            <!-- Data Pelanggan Ends-->
        </div>
    </div>
    @push('scripts')
    {{-- START DATATABLE --}}
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    {{-- END DATATABLE --}}
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>
    @endpush

</x-backend.master>
