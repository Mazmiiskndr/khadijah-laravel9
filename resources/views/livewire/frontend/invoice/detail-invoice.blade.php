<div class="card" style="margin-bottom: 0px">
    <div class="card-body">
        <div class="invoice">
            <div>
                <div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="media">
                                <div class="media-left"><img class="media-object img-60"
                                        src="{{ asset('assets/images/favicon_khadijah.png') }}" alt=""></div>
                                <div class="media-body m-l-20 text-right">
                                    <h4 class="media-heading">Khadijah Label</h4>
                                    <p>{{ $contact->email }}<br><span>{{ $contact->phone }}</span></p>
                                </div>
                            </div>
                            <!-- End Info-->
                        </div>
                        <div class="col-sm-6">
                            <div class="text-md-end text-xs-center">
                                <h3>Invoice #<span class="counter">{{ $orders->order_number }}</span></h3>
                                <p>Tanggal : {{ date('F j, Y', strtotime($orders->order_date)) }}<br> Total Pesanan : Rp.
                                    {{ number_format($totalPrice + $shippingDetail['delivery_cost'], 0, ',', '.') }}</p>
                            </div>
                            <!-- End Title-->
                        </div>
                    </div>
                </div>
                <hr>
                <!-- End InvoiceTop-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="media">
                            <div class="media-left"><img class="media-object rounded-circle img-60"
                                    src="../assets/images/user/1.jpg" alt=""></div>
                            <div class="media-body m-l-20">
                                <h4 class="media-heading">{{ $orders->receiver_name }}</h4>
                                <p>{{ $orders->shipping_province }}, {{ $orders->shipping_city }}, {{
                                    $orders->shipping_address }}, {{ $orders->shipping_postal_code }}<br><span>{{
                                        $orders->receiver_phone }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end" id="project">
                            <h6>Detail Pembayaran</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <th style="padding: 3px">Metode Pembayaran</th>
                                    <th width="5%" style="padding: 3px">:</th>
                                    <th width="30%" style="padding: 3px">
                                        @if(strtoupper($orders->order_type) == "BANK")
                                            {{ $orders->provider }}
                                        @endif
                                    </th>
                                </tr>
                                @if(strtoupper($orders->order_type) == "BANK")
                                <tr>
                                    <th style="padding: 3px">Nama Rekening</th>
                                    <th width="5%" style="padding: 3px">:</th>
                                    <th style="padding: 3px">{{ $orders->rekening_name }}</th>
                                </tr>
                                <tr>
                                    <th style="padding: 3px">Nomor Rekening</th>
                                    <th width="5%" style="padding: 3px">:</th>
                                    <th style="padding: 3px">{{ $orders->rekening_number }}</th>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Invoice Mid-->
                <div>
                    <div class="table-responsive invoice-table" id="table">
                        <table class="table table-bordered table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td class="item">
                                        <h6 class="p-2 mb-0">Nama Produk</h6>
                                    </td>
                                    <td class="Hours">
                                        <h6 class="p-2 mb-0">Kuantitas</h6>
                                    </td>
                                    <td class="Rate">
                                        <h6 class="p-2 mb-0">Harga</h6>
                                    </td>
                                    <td class="subtotal">
                                        <h6 class="p-2 mb-0">Sub-total</h6>
                                    </td>
                                </tr>
                                @foreach ($products as $productDetail)
                                <tr>
                                    <td>
                                        <label>{{ $productDetail['product']->product_name }}</label>
                                    </td>
                                    <td>
                                        <p class="itemtext">{{ $productDetail['quantity'] }}</p>
                                    </td>
                                    <td>
                                        <p class="itemtext">Rp. {{ number_format(($productDetail['product']->price - $productDetail['product']->discount), 0,
                                            ',', '.') }}</p>
                                    </td>
                                    <td>
                                        <p class="itemtext">Rp. {{ number_format(($productDetail['product']->price - $productDetail['product']->discount) *
                                            $productDetail['quantity'], 0, ',', '.') }}</p>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="Rate">
                                        <h6 class="mb-0 p-2">Ongkos Kirim</h6>
                                    </td>
                                    <td class="payment">
                                        <h6 class="mb-0 p-2">Rp. {{ number_format($shippingDetail['delivery_cost'], 0, ',', '.') }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="Rate">
                                        <h6 class="mb-0 p-2">Total</h6>
                                    </td>
                                    <td class="payment">
                                        <h6 class="mb-0 p-2">Rp. {{ number_format($totalPrice +
                                            $shippingDetail['delivery_cost'], 0, ',', '.') }}</h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table-->
                    <div class="row">
                        <div class="col-md-8">
                            <div>
                                <p class="legal">
                                    <small><strong>Terima kasih telah berbelanja di Khadijah Label!</strong> Pesanan
                                        mukena Anda sedang diproses dan akan segera
                                        dikirim. Kami
                                        berkomitmen menyediakan mukena berkualitas tinggi untuk menambah khusyu' ibadah
                                        Anda. Jika butuh bantuan, jangan
                                        ragu menghubungi kami. <strong>Selamat beribadah!</strong></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End InvoiceBot-->
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3">
    <button id="printInvoice" onclick="window.print();" class="btn btn btn-primary me-2" type="button">
        <i class="fas fa-print"></i> Cetak Invoice
    </button>
</div>
