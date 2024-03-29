<div>
    <!-- Create Modal Customer-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="updateCustomerModal">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Customer</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        @csrf
                        {{-- Name And Email --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="name_input">Nama Customer</label>
                                <input type="hidden" class="form-control" name="customer_id" id="customer_id"
                                    wire:model="customer_id">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Masukan Nama Pelanggan.." name="name" id="name_input" wire:model="name"
                                    autofocus>
                                @error('name') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="email_input">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukan Email.." name="email" id="email_input" wire:model="email"
                                    autofocus>
                                @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
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

                        {{-- Province, City and District--}}
                        <div class="row mt-1">
                            <div class="col-6">
                                <label for="province_id_input">Provinsi</label>
                                <select class="select2 col-sm-12 @error('province_id') is-invalid @enderror"
                                    id="province_id_input" name="province_id" wire:model="province_id">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach($provinces as $province)
                                    <option value="{{ $province['province_id'] }}">{{ strtoupper($province['province']) }}</option>
                                    @endforeach
                                </select>
                                @error('province_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="city_id_input">Kota / Kabupaten</label>
                                <select class="select2 col-sm-12 @error('city_id') is-invalid @enderror"
                                    id="city_id_input" name="city_id" wire:model="city_id">
                                    <option value="" selected>-- Pilih Kota / Kabupaten --</option>
                                    @if(!is_null($cities))
                                    @foreach($cities as $city)
                                    <option value="{{ $city['city_id'] }}">{{ strtoupper($city['type']) }} {{ strtoupper($city['city_name']) }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('city_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Address and Postal Code --}}
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="postal_code_input">Kode Pos</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                    placeholder="Masukan Kode Pos.." name="postal_code" id="postal_code_input"
                                    wire:model="postal_code" autofocus>
                                @error('postal_code') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-8">
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

</div>
