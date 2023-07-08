<div>
    <!-- Create Modal Customer-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="updateCustomerModal">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        @csrf
                        {{-- Name And Email --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="email_input">Email</label>
                                <input type="hidden" class="form-control" name="customer_id" id="customer_id" wire:model="customer_id" readonly>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email.."
                                    name="email" id="email_input" wire:model="email" readonly>
                                @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-6">
                                <label for="name_input">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Masukan Nama Pelanggan.." name="name" id="name_input" wire:model="name"
                                    autofocus>
                                @error('name') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        {{-- Password and Number Phone --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="phone_input">No. Telepon / WhatsApp</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="Masukan Kode Pos.." name="phone" id="phone_input" wire:model="phone"
                                    autofocus>
                                @error('phone') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="password_input">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukan Password.." name="password" id="password_input"
                                    wire:model="password" autofocus>
                                @if($password)
                                @error('password') <small class="error text-danger">{{ $message }}</small> @enderror
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin diganti.</small>
                                @endif
                            </div>
                        </div>

                        {{-- Province, City District--}}
                        <div class="row mt-1">
                            <div class="col-lg-4 col-12">
                                <label for="province_id_input">Provinsi</label>
                                <select class="form-select col-sm-12 @error('province_id') is-invalid @enderror"
                                    id="province_id_input" name="province_id" wire:model="province_id">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach($provinces as $province)
                                    <option value="{{ $province['province_id'] }}">{{ strtoupper($province['province']) }}</option>
                                    @endforeach
                                </select>
                                @error('province_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-lg-4 col-12">
                                <label for="city_id_input">Kota / Kabupaten</label>
                                <select class="form-select col-sm-12 @error('city_id') is-invalid @enderror"
                                    id="city_id_input" name="city_id" wire:model="city_id">
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
                            <div class="col-lg-4 col-12">
                                <label for="district_id_input">Kecamatan</label>
                                <select class="form-select col-sm-12 @error('district_id') is-invalid @enderror"
                                    id="district_id_input" name="district_id" wire:model="district_id">
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

                        {{-- Address and Postal Code --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="address_input">Alamat</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Masukan Alamat.." name="address" id="address_input"
                                    wire:model="address" autofocus>
                                @error('address') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" aria-label="batalclose" type="button" data-bs-dismiss="modal"
                            wire:click="closeModal">Batal</button>
                        <button class="btn btn-primary" type="submit" aria-label="submitupdate">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        (function($){
            $(document).on('livewire:load', function() {
                Livewire.hook('message.processed', (message, component) => {})
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

</div>
