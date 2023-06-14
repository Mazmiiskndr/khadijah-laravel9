<form wire:submit.prevent="storeCheckout" method="POST">
    <div class="row">
        <div class="col-lg-7 col-sm-12 col-xs-12">
            <div class="checkout-title">
                <h3>Detail Penagihan</h3>
            </div>
            <div class="row check-out">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <div class="field-label">Nama Lengkap</div>
                    <input type="hidden" name="customer_uid" wire:model="customer_uid">
                    <input type="text" name="name" placeholder="Masukan Nama Lengkap" wire:model="name">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">No. Telepon / WhatsApp</div>
                    <input type="text" name="phone" placeholder="Masukan No. Telepon / WhatsApp" wire:model="phone">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">Email</div>
                    <input type="email" name="email" placeholder="Masukan Email" wire:model="email" readonly>
                </div>

                {{-- *** TODO: WITH RAJAONGKIR API --}}
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">Provinsi</div>
                    <select name="province_id" wire:model="province_id" class="form-select">
                        <option value="">-- Pilih Provinsi --</option>

                        @foreach($provinces as $province)
                        <option value="{{ $province['province_id'] }}">{{ strtoupper($province['province']) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">Kota / Kabupaten</div>
                    <select name="city_id" id="city_id" wire:model="city_id" class="form-select">
                        <option value="">-- Pilih Kota / Kabupaten --</option>
                        @if(!is_null($cities))
                        @foreach($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ strtoupper($city['type']) }} {{ strtoupper($city['city_name']) }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <div class="field-label">Kode Pos</div>
                    <input type="text" name="postal_code" placeholder="Masukan Email" wire:model="postal_code">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <div class="field-label">Ekspedisi</div>
                    <select name="expedition" id="expedition" wire:model="expedition" class="form-select">
                        <option value="">-- Pilih Ekspedisi --</option>
                        <option value="JNE">JNE</option>
                        <option value="POS INDONESIA">POS INDONESIA</option>
                        <option value="TIKI">TIKI</option>
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <div class="field-label">Paket</div>
                    <select name="parcel" id="parcel" wire:model="parcel" class="form-select">
                        <option value="">-- Pilih Paket --</option>
                    </select>
                </div>

                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                    <div class="field-label">Alamat</div>
                    <input type="text" name="address" placeholder="Masukan Alamat" wire:model="address">
                    @if (!$address)
                    <small class="error text-danger">Anda belum mengatur alamat pengiriman!</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 col-xs-12">
            <div class="checkout-details">
                <div class="order-box">
                    <div class="title-box">
                        <div>Produk <span>Total</span></div>
                    </div>
                    <ul class="qty">
                        @php
                        $subtotal = 0;
                        @endphp
                        @foreach ($carts as $cart)
                        {{-- Declare Subtotal and Total Per Price --}}
                        @php
                        $totalPerPrice = $cart->quantity * $cart->product->price;
                        if ($cart->product->discount > 0){
                        $subtotal += $totalPerPrice - $cart->product->discount;
                        }else{
                        $subtotal += $totalPerPrice;
                        }
                        @endphp

                        <li>{{ $cart->product->product_name }} × {{ $cart->quantity }}

                            <span>
                                @if ($cart->product->discount > 0)
                                Rp. {{ number_format($totalPerPrice - $cart->product->discount, 0, ',', '.') }}
                                @else
                                Rp. {{ number_format($totalPerPrice, 0, ',', '.') }}
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    <ul class="sub-total">
                        <li>SubTotal <span class="count">Rp. {{ number_format($subtotal,0, ',', '.') }}</span></li>

                        {{-- *** TODO: SHIPPING *** --}}
                        {{-- <li>Shipping
                            <div class="shipping">
                                <div class="shopping-option">
                                    <input type="checkbox" name="free-shipping" id="free-shipping">
                                    <label for="free-shipping">Free Shipping</label>
                                </div>
                                <div class="shopping-option">
                                    <input type="checkbox" name="local-pickup" id="local-pickup">
                                    <label for="local-pickup">Local Pickup</label>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                    <ul class="total">
                        <li>Total <span class="count">Rp. {{ number_format($subtotal,0, ',', '.') }}</span></li>
                    </ul>
                </div>
                <div class="payment-box">
                    <div class="upper-box">
                        <div class="payment-options">
                            <ul>
                                <li>
                                    <div class="radio-option">
                                        <input type="radio" name="payment-group" id="payment-1" checked="checked">
                                        <label for="payment-1">Check Payments<span class="small-text">Please send a
                                                check to
                                                Store
                                                Name, Store Street, Store Town, Store State /
                                                County, Store Postcode.</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio-option">
                                        <input type="radio" name="payment-group" id="payment-2">
                                        <label for="payment-2">Cash On Delivery<span class="small-text">Please send a
                                                check to
                                                Store
                                                Name, Store Street, Store Town, Store State /
                                                County, Store Postcode.</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio-option paypal">
                                        <input type="radio" name="payment-group" id="payment-3">
                                        <label for="payment-3">PayPal<span class="image"><img
                                                    src="../assets/images/paypal.png" alt=""></span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-end"><a href="#" class="btn-solid btn">Lanjutkan Pembayaran</a></div>
                </div>
            </div>
        </div>
    </div>
</form>
