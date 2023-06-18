<div class="row">
    <div class="col-12">
        <div class="card dashboard-table mt-0">
            <div class="card-body table-responsive-sm">
                <div class="top-sec">
                    <h3>Data Transaksi</h3>
                </div>
                <div class="table-responsive-xl">
                    <table class="table cart-table order-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Order Id</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    <span class="mt-0">{{ $order->order_number }}</span>
                                </td>
                                <td>
                                    @php
                                    switch ($order->order_status) {
                                    case 'Menunggu Pembayaran':
                                    $badgeColor = 'warning';
                                    break;
                                    case 'Sedang Diverifikasi':
                                    case 'Pesanan Diproses':
                                    $badgeColor = 'primary';
                                    break;
                                    case 'Pesanan Dikirim':
                                    case 'Pesanan Diterima':
                                    $badgeColor = 'info';
                                    break;
                                    case 'Pesanan Selesai':
                                    $badgeColor = 'success';
                                    break;
                                    case 'Pesanan Dibatalkan':
                                    case 'Pengembalian Dana':
                                    $badgeColor = 'danger';
                                    break;
                                    default:
                                    $badgeColor = 'secondary';
                                    }
                                    @endphp
                                    <span class="badge rounded-pill bg-{{ $badgeColor }} custom-badge">{{
                                        $order->order_status }}</span>
                                </td>
                                <td>
                                    <span class="fs-6">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('transaction.show', $order->order_uid) }}">
                                        <i class="fa fa-eye text-theme"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
