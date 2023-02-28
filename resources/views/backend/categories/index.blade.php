@push('styles')
@endpush
<x-backend.master title="Kategori | Khadijah">
    @slot('breadcrumbTitle')
    <h3>Kategori</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Kategori</li>
    @endslot


    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Data Kategori</h3>
                    </div>
                    <div class="card-body">
                        {{-- *** TODO: *** --}}
                        <table id="datatables" class="table table-hover is-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->

        </div>
    </div>
    <!-- Container-fluid Ends-->

</x-backend.master>
<script>
    $(document).ready(function () {
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('backend.categories.datatables') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '10px', orderable: false, searchable: false},
                {data: 'category_name', name: 'category_name'},
                {data: 'description_short', name: 'category_description'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@push('scripts')

@endpush
