<div class="col-xl-6 col-md-12 box-col-12 mb-3">
    <div class="card h-100">
        <div class="card-header pb-0 card-no-border d-flex">
            <h5>Tabel Penjualan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display" id="datatables">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>
                                <span class="badge badge-{{ $colors[$order->order_number] }}">
                                    {{ $order->order_status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('backend.sales.edit',$order->order_uid) }}">
                                    <button type="button" class="btn btn-pill btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        @if (session()->has('success'))
                        <script>
                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: '{{ session('success') }}',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                        </script>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
    $('#datatables').DataTable();
    });
</script>
@endpush
