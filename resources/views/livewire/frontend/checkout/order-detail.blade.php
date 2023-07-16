<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="product-order">
                @php
                $totalPrice = 0;
                @endphp
                @foreach ($products as $productDetail)
                {{-- {{ dd($productDetail['product']->thumbnail); }} --}}
                <div class="row product-order-detail">
                    <div class="col-2">
                        <img src="{{ asset('storage/'.$productDetail['product']->thumbnail) }}" alt=""
                            class="img-fluid blur-up lazyload">
                    </div>
                    <div class="col-5 order_detail">
                        <div>
                            <h4>Nama Produk</h4>
                            <h5 style="font-weight: 400">{{ $productDetail['product']->product_name }}</h5>
                        </div>
                    </div>
                    <div class="col-2 order_detail">
                        <div>
                            <h4>Kuantitas</h4>
                            <h5 class="text-center">{{ $productDetail['quantity'] }}</h5>
                        </div>
                    </div>
                    <div class="col-3 order_detail">
                        <div>
                            <h4>Harga / pcs</h4>
                            <h5 style="font-weight: 500">Rp. {{ number_format($productDetail['price'], 0, ',', '.') }}</h5>
                            @if ($orderStatuses['ORDER_RECEIVED'] == $orders->order_status || $orderStatuses['ORDER_COMPLETED'] ==
                            $orders->order_status)
                            {{-- TODO: --}}
                            <button type="button" class="btn-solid btn-sm mt-3" style="padding: 2px 9px" wire:click="showRatingModal('{{ $productDetail['product']->product_uid }}')">
                                <i class="fas fa-star"></i>
                                Beri Penilaian
                            </button>
                            @endif
                        </div>
                    </div>

                </div>
                @php
                $totalPrice += $productDetail['price'];
                @endphp
                @endforeach

                <div class="total-sec">
                    <ul>
                        <li>Sub Total <span>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span></li>
                        <li>Ongkos Kirim <span>Rp. {{ number_format($shippingDetail['delivery_cost'], 0, ',', '.')
                                }}</span></li>
                    </ul>
                </div>
                <div class="final-total">
                    <h3>Total <span>Rp. {{ number_format($orders->total_price , 0, ',', '.')
                            }}</span></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="order-success-sec">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Ringkasan</h4>
                        <ul class="order-detail">
                            <li>ID Pesanan : {{ $orders->order_number }}</li>
                            <li>Tanggal Pesanan : {{ date('d-m-Y', strtotime($orders->order_date)) }}</li>
                            <li>Total Pesanan: Rp. {{ number_format($orders->total_price, 0,
                                ',', '.') }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 payment-mode">
                        <h4>Metode Pembayaran</h4>
                        <p>{{ strtoupper($orders->order_type) }}</p>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <h4>Alamat Pengiriman</h4>
                        <ul class="order-detail">
                            <li>{{ $orders->receiver_name }}</li>
                            <li>{{ $orders->shipping_province }}, {{ $orders->shipping_city }}, {{
                                $orders->shipping_address }}, {{ $orders->shipping_postal_code }}</li>
                            <li>No.Kontak : {{ $orders->receiver_phone }}</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="delivery-sec">
                            <h3>Status Order : <span class="{{ 'text-' . $colors }}">{{ $orders->order_status }}</span>
                            </h3>
                            <button type="button" class="btn-solid btn-sm mt-3"
                                onclick="javascript:window.history.back(-1);return false;"><i
                                    class="fas fa-backward"></i> Kembali</button>
                            @if($orderStatuses['PENDING_PAYMENT'] == $orders->order_status )
                            @if(strtoupper($orders->order_type) == "BANK")
                            <button type="button" class="btn-solid btn-sm mt-3" wire:click="showPaymentModal">
                                <i class="fas fa-credit-card"></i>
                                Bayar
                            </button>
                            @endif
                            @elseif ($orderStatuses['ORDER_SENT'] == $orders->order_status)
                            <button type="button" class="btn-solid btn-sm mt-3" wire:click="orderReceived">
                                <i class="fas fa-shopping-bag"></i>
                                Pesanan di Terima
                            </button>
                            <button id="printInvoice" data-uid="{{ $orders->order_uid }}" class="btn-solid btn-sm mt-3">
                                <i class="fas fa-print"></i> Cetak Invoice
                            </button>
                            @elseif ($orderStatuses['ORDER_RECEIVED'] == $orders->order_status || $orderStatuses['ORDER_COMPLETED'] == $orders->order_status)

                            <button id="printInvoice" data-uid="{{ $orders->order_uid }}" class="btn-solid btn-sm mt-3">
                                <i class="fas fa-print"></i> Cetak Invoice
                            </button>
                            @else
                            <button id="printInvoice" data-uid="{{ $orders->order_uid }}"
                                class="btn-solid btn-sm mt-3">
                                <i class="fas fa-print"></i> Cetak Invoice
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- START FORM PAYMENT MODAL --}}
    @livewire('frontend.checkout.payment',['order_uid' => $orders->order_uid,'customer_id' => $orders->customer_id,])
    {{-- END FORM PAYMENT MODAL --}}

    {{-- START FORM RATING MODAL --}}
    @livewire('frontend.checkout.rating',['order_uid' => $orders->order_uid, 'customer_id' => $orders->customer_id,])
    {{-- END FORM RATING MODAL --}}

    @push('scripts')
    <script>
        window.addEventListener('show-payment-modal', event => {
            $('#createPayment').modal('show');
        });

        window.addEventListener('show-rating-modal', event => {
            $('#createRating').modal('show');
        });

        document.addEventListener('click', function (event) {
            if (event.target.id !== 'printInvoice') return;

            var uid = event.target.getAttribute('data-uid');
            var invoiceUrl = '/invoice/' + uid;
            window.open(invoiceUrl, '_blank');
        });

    </script>
    @endpush

</div>
