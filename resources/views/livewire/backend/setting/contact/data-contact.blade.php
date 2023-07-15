<form wire:submit.prevent="update">
    @csrf
    {{-- SHOP NAME, EMAIL AND PHONE --}}
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="shop_name">Nama Toko</label>
                <input type="hidden" class="form-control" name="contact_id" id="contact_id" wire:model="contact_id">
                <input type="text" class="form-control @error('shop_name') is-invalid @enderror"
                    placeholder="Masukan Nama Toko.." name="shop_name" id="shop_name" wire:model="shop_name">
                @error('shop_name') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="shop_email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukan Email.." name="email" id="shop_email" wire:model="email">
                @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="shop_phone">No. Telepon/WhatsApp</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="Masukan No. Telepon/WhatsApp.." name="phone" id="shop_phone" wire:model="phone">
                @error('phone') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    {{-- TIKTOK, INSTAGRAM AND FACEBOOK --}}
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="tiktok">Tiktok</label>
                <input type="text" class="form-control @error('tiktok') is-invalid @enderror"
                    placeholder="Masukan Link Tiktok.." name="tiktok" id="tiktok" wire:model="tiktok">
                @error('tiktok') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                    placeholder="Masukan Link Instagram.." name="instagram" id="instagram" wire:model="instagram">
                @error('instagram') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                    placeholder="Masukan Link Facebook.." name="facebook" id="facebook" wire:model="facebook">
                @error('facebook') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    {{-- SHOPEE AND TOKOPEDIA --}}
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="shopee">Shopee</label>
                <input type="text" class="form-control @error('shopee') is-invalid @enderror"
                    placeholder="Masukan Link Shopee.." name="shopee" id="shopee" wire:model="shopee">
                @error('shopee') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="tokped">Tokopedia</label>
                <input type="text" class="form-control @error('tokped') is-invalid @enderror"
                    placeholder="Masukan Link Tokopedia.." name="tokped" id="tokped" wire:model="tokped">
                @error('tokped') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>


    {{-- PROVINCES AND CITIES --}}
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="province_id_input">Provinsi</label>
                <select class="select2 col-sm-12 @error('province_id') is-invalid @enderror" id="province_id_input"
                    name="province_id" wire:model="province_id">
                    <option value="">-- Pilih Provinsi --</option>
                    @foreach($provinces as $province)
                    <option value="{{ $province['province_id'] }}">{{ strtoupper($province['province']) }}</option>
                    @endforeach
                </select>
                @error('province_id') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="city_id_input">Kota / Kabupaten</label>
                <select class="select2 col-sm-12 @error('city_id') is-invalid @enderror" id="city_id_input"
                    name="city_id" wire:model="city_id">
                    <option value="" selected>-- Pilih Kota / Kabupaten --</option>
                    @if(!is_null($cities))
                    @foreach($cities as $city)
                    <option value="{{ $city['city_id'] }}">{{ strtoupper($city['type']) }} {{ strtoupper($city['city_name']) }}</option>
                    @endforeach
                    @endif
                </select>
                <small wire:loading wire:target="province_id" class="text-info">Loading...</small>
                @error('city_id') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="district_id_input">Kecamatan</label>
                <select class="select2 col-sm-12 @error('district_id') is-invalid @enderror" id="district_id_input"
                    name="district_id" wire:model="district_id">
                    <option value="" selected>-- Pilih Kecamatan --</option>
                    @if(!is_null($districts))
                    @foreach($districts as $district)
                    <option value="{{ $district['subdistrict_id'] }}">{{ strtoupper($district['subdistrict_name']) }}</option>
                    @endforeach
                    @endif
                </select>
                <small wire:loading wire:target="city_id" class="text-info">Loading...</small>
                @error('district_id') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    {{-- SHOPEE AND TOKOPEDIA --}}
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="address_input">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror"
                    placeholder="Masukan Alamat.." name="address" id="address_input" wire:model="address" autofocus>
                @error('address') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>


    <div class="card-footer text-end">
        <button class="btn btn-lg btn-pill btn-primary" type="submit">Update</button>
    </div>
    @push('scripts')
    <script>
        (function($){
                $(document).on('livewire:load', function() {

                    $('.select2').select2()
                    $('select[name="province_id"]').on('change', function(){
                        @this.province_id = $(this).val()
                    })
                    $('select[name="city_id"]').on('change', function(){
                        @this.city_id = $(this).val()
                    })
                    $('select[name="district_id"]').on('change', function(){
                        @this.district_id = $(this).val()
                    })
                    Livewire.hook('message.processed', (message, component) => {
                        $('.select2').select2();
                    })
                })
            })(jQuery)
    </script>
    @endpush

    @if (session()->has('error'))
    <script>
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            })

    </script>
    @endif
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
</form>
