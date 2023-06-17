<form wire:submit.prevent="storeCheckout" method="POST">
    <div class="row">
        @if(count($carts) <= 0 )
        <div class="alert alert-danger" style="margin-left: 5px;">
            Tidak ada produk di keranjang. Silakan tambahkan produk ke keranjang sebelum melakukan checkout.
        </div>
        @else
        <div class="col-lg-7 col-sm-12 col-xs-12">
            <div class="checkout-title">
                <h3>Detail Penagihan</h3>
            </div>
            <div class="row check-out">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <div class="field-label">Nama Lengkap</div>
                    <input type="hidden" name="customer_uid" wire:model="customer_uid">
                    <input type="text" name="name" placeholder="Masukan Nama Lengkap" wire:model="name">
                    @error('name') <small class="error text-danger" style="margin-left: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">No. Telepon / WhatsApp</div>
                    <input type="text" name="phone" placeholder="Masukan No. Telepon / WhatsApp" wire:model="phone">
                    @error('phone') <small class="error text-danger" style="margin-left: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">Email</div>
                    <input type="email" name="email" placeholder="Masukan Email" wire:model="email" readonly>
                    @error('email') <small class="error text-danger" style="margin-left: 5px;">{{ $message }}</small>
                    @enderror
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
                    @error('province_id') <small class="error text-danger" style="margin-left: 5px;">{{ $message
                        }}</small> @enderror
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">Kota / Kabupaten</div>
                    <select name="city_id" id="city_id" wire:model="city_id" class="form-select">
                        <option value="">-- Pilih Kota / Kabupaten --</option>
                        @if(!is_null($cities))
                        @foreach($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ strtoupper($city['type']) }} {{
                            strtoupper($city['city_name']) }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('city_id') <small class="error text-danger" style="margin-left: 5px;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">Ekspedisi</div>
                    <select name="expedition" id="expedition" wire:model="expedition" class="form-select">
                        <option value="">-- Pilih Ekspedisi --</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS INDONESIA</option>
                        <option value="tiki">TIKI</option>
                    </select>
                    @error('expedition') <small class="error text-danger" style="margin-left: 5px;">{{ $message
                        }}</small> @enderror
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <div class="field-label">Paket</div>
                    <select name="parcel" id="parcel" wire:model="parcel" class="form-select">
                        <option value="">-- Pilih Paket --</option>
                        @if(!is_null($parcels))
                        @foreach($parcels as $parcel)
                        <option value="{{ $parcel['service'] }}" ongkir="{{ $parcel['cost'][0]['value'] }}"
                            estimasi="{{ ucwords($parcel['cost'][0]['etd']) . " Hari" }}">
                            {{ $parcel['service'] . " - Rp. " . number_format($parcel['cost'][0]['value'],0,',','.') . "
                            - Estimasi " .
                            ucwords($parcel['cost'][0]['etd']) . " Hari" }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                    @error('parcel') <small class="error text-danger" style="margin-left: 5px;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <div class="field-label">Alamat</div>
                    <input type="text" name="address" placeholder="Masukan Alamat" wire:model="address">
                    @if (!$address)
                    <small class="error text-danger" style="margin-left: 5px;">Anda belum mengatur alamat
                        pengiriman!</small>
                    @endif
                    @error('address') <small class="error text-danger" style="margin-left: 5px;">{{ $message }}</small>
                    @enderror
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
                        {{-- INPUT FOR TO NEED STORE --}}
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
                        <li>SubTotal <span class="count">Rp. {{ number_format($subTotal,0, ',', '.') }}</span></li>
                        @if($deliveryCost > 0)
                        <li>Ongkos Kirim <span class="count">Rp. {{ number_format($deliveryCost,0, ',', '.') }}</span>
                        </li>
                        @endif
                    </ul>
                    <ul class="total">
                        <li>Total <span class="count">Rp. {{ number_format($total,0, ',', '.') }}</span></li>
                    </ul>
                </div>
                <div class="payment-box">
                    <div class="upper-box">
                        <div class="payment-options">
                            <ul>
                                <li>
                                    <div class="radio-option">
                                        <input type="radio" value="cod" wire:model="paymentMethod" name="payment-group"
                                            id="payment-2">
                                        <label for="payment-2">(COD) / Bayar di Tempat</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio-option paypal">
                                        <input type="radio" value="bank" wire:model="paymentMethod" name="payment-group"
                                            id="payment-3">
                                        <label for="payment-3">Pembayaran Melalui Bank</label>
                                    </div>
                                </li>
                            </ul>
                            @error('paymentMethod')
                            <div class="alert alert-danger" style="margin-left: 5px;">
                                {{ $message }}
                            </div>
                            @enderror
                            <div id="bank_dropdown" style="display: none;" wire:ignore>
                                <p style="color: black;"><b>Tujuan Transfer : </b></p>
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <th>Bank</th>
                                        <th>:</th>
                                        <td>BCA</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Rekening</th>
                                        <th>:</th>
                                        <td>MOCH AZMI ISKANDAR</td>
                                    </tr>
                                    <tr>
                                        <th>No. Rek</th>
                                        <th>:</th>
                                        <td>1770006605478</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn-solid btn">Lanjutkan Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
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
</form>

@push('scripts')
<script>
    $(document).ready(function(){
        $("input[name='payment-group']").click(function(){
            var radioValue = $("input[name='payment-group']:checked").attr("id");
            if(radioValue == "payment-3"){
                $("#bank_dropdown").show();
            } else {
                $("#bank_dropdown").hide();
            }
        });
    });
</script>
@endpush
