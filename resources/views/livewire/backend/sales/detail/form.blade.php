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
                    @if($promo)
                    <tr>
                        <th><b>Promo</b></th>
                        <th>:</th>
                        @if ($promo->promo->discount_type == 'Persen')
                        <td>- {{ $promo->promo->discount_value }}%</td>
                        @else
                        <td>- Rp. {{ number_format($promo->promo->discount_value, 0, ',', '.') }}</td>
                        @endif
                    </tr>
                    @endif

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
                <form wire:submit.prevent="updateStatus" method="POST">
                    <div style="margin-left: 10px;" class="mt-3">
                        <h5>Status Order </h5>
                        <div class="form-group">
                            <select name="order_status" id="order_status" wire:model="order_status" class="form-select"
                                style="width: 300px;">
                                <option value="{{ $orders->order_status }}" hidden selected>{{ $orders->order_status }}</option>

                                @foreach($orderStatuses as $status)
                                <option value="{{ $status }}">
                                    {{ $status }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div style="margin-left: 10px;" class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
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
                        <th><b>Kecamatan</b></th>
                        <th>:</th>
                        <td>{{ $orders->shipping_district }}</td>
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
                    @if($orders->payment_proof)
                    <button type="button" class="btn btn-success btn-sm" wire:click="downloadPaymentProof"><i
                            class="fas fa-lg fa-download"></i> &nbsp;
                        Download Bukti
                        Pembayaran</button>
                    @endif
                    <a href="{{ route('transaction.invoice', $orders->order_uid) }}" target="_blank">
                        <button class="btn btn-info btn-sm">
                            <i class="fas fa-lg fa-print"></i> &nbsp; Invoice
                        </button>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm"
                        onclick="javascript:window.history.back(-1);return false;"><i class="fas fa-lg fa-backward"></i>
                        &nbsp;
                        Back</button>
                </div>
            </div>
            @if(!$shippingDetail['tracking_number'])
            <div class="col-lg-12">
                <form wire:submit.prevent="storeWaybill" method="POST">
                    <div style="margin-left: 10px;" class="mt-3">
                        <h5>Cek Resi </h5>
                        <div class="form-group">
                            <label for="tracking_number">Masukan No Resi</label>
                            <input type="text" class="form-control @error('tracking_number') is-invalid @enderror"
                                placeholder="Masukan No Resi.." name="tracking_number" id="tracking_number"
                                wire:model="tracking_number">
                            @error('tracking_number') <small class="error text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div style="margin-left: 10px;" class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            @endif
            @if($manifests)
            <div class="col-lg-12 mt-3">
                <div class="d-flex justify-content-between">
                    <h5>Perjalanan Paket</h5>
                    <h5>Status Paket : {{ ucwords(strtolower($statusResi)) }}</h5>
                </div>
                <style>
                    .table-bordered tbody,
                    .table-bordered td,
                    .table-bordered tfoot,
                    .table-bordered th,
                    .table-bordered thead,
                    .table-bordered tr {
                        border-color: #cccccc
                    }

                    .table>:not(:last-child)>:last-child>* {
                        border-bottom-color: #cccccc
                    }
                </style>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th width="5%"><b>No.</b></th>
                                <th><b>Tanggal</b></th>
                                <th><b>Keterangan</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($manifests as $key => $manifest)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ date('Y-m-d', strtotime($manifest['manifest_date'])) }} {{
                                    $manifest['manifest_time']
                                    }}</td>
                                <td>{{ $manifest['manifest_description'] }}: {{ $manifest['city_name'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            @endif
        </div>
    </div>

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
    @if (session()->has('error'))
    <script>
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            })
    </script>
    @endif
</div>
