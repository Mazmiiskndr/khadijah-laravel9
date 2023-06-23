<div class="card">
    <div class="card-header pb-0 card-no-border d-flex">
        <h5>ID Transaksi : <b>{{ $orders->order_number }}</b></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-12 mb-3">
                <div style="margin-left: 10px;">
                    <h5>Ringkasan</h5>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <th width="200px"><b>Tanggal Pesanan</b></th>
                        <th width="10px">:</th>
                        <td>{{ $orders->order_date }}</td>
                    </tr>
                    <tr>
                        <th width="200px"><b>Ekspedisi & Paket</b></th>
                        <th width="10px">:</th>
                        <td>{{ strtoupper($shippingDetail['expedition']) . " - " . $shippingDetail['parcel'] }}</td>
                    </tr>
                    <tr>
                        <th><b>Ongkos Kirim</b></th>
                        <th>:</th>
                        <td>Rp. {{ number_format($shippingDetail['delivery_cost'], 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th><b>Total Pesanan</b></th>
                        <th>:</th>
                        <td>Rp. {{ number_format($orders->total_price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th><b>Metode Pembayaran</b></th>
                        <th>:</th>
                        <td>{{ $orders->order_type }}</td>
                    </tr>
                </table>
                <div style="margin-left: 10px;" class="mt-3">
                    <h5>Status Order </h5>
                    <div class="form-group">
                        <select name="" id="" class="form-select" style="width: 300px;">
                            {{-- <option value="{{ $orders->order_status }}">{{ $orders->order_status }}</option> --}}
                            @foreach($orderStatuses as $status)
                            <option value="{{ $status }}" {{ $orders->order_status == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-12">
                <div style="margin-left: 10px;">
                    <h5 class>Alamat Pengiriman</h5>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <th width="200px"><b>Nama Penerima</b></th>
                        <th width="10px">:</th>
                        <td>{{ $orders->receiver_name }}</td>
                    </tr>
                    <tr>
                        <th><b>Provinsi</b></th>
                        <th>:</th>
                        <td>{{ $orders->shipping_province }}</td>
                    </tr>
                    <tr>
                        <th><b>Kota</b></th>
                        <th>:</th>
                        <td>{{ $orders->shipping_city }}</td>
                    </tr>
                    <tr>
                        <th><b>Alamat</b></th>
                        <th>:</th>
                        <td>{{ $orders->shipping_address }}</td>
                    </tr>
                    <tr>
                        <th><b>Kode POS</b></th>
                        <th>:</th>
                        <td>{{ $orders->shipping_postal_code }}</td>
                    </tr>
                    <tr>
                        <th><b>No. Kontak</b></th>
                        <th>:</th>
                        <td>{{ $orders->receiver_phone }}</td>
                    </tr>
                </table>
                <div style="margin-left: 10px;" class="mt-3">
                    <button class="btn btn-primary btn-sm"><i class="fas fa-lg fa-download"></i> &nbsp; Download Bukti
                        Pembayaran</button>
                    <a href="{{ route('transaction.invoice', $orders->order_uid) }}" target="_blank">
                        <button class="btn btn-info btn-sm">
                            <i class="fas fa-lg fa-print"></i> &nbsp; Invoice
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
