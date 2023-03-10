<div>
    {{-- Button Modal Promo --}}
    <button class="pull-right btn btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#createPromoModal">
        <i class="fa fa-plus"></i>
        Tambah Data Promo
    </button>

    <!-- Create Modal Promo-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="createPromoModal" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Promo</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                {{-- *** TODO: CREATE PROMO *** --}}
                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        @csrf
                        {{-- Promo Name And Promo Code --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="promo_name">Nama Promo</label>
                                <input type="text" class="form-control @error('promo_name') is-invalid @enderror"
                                    placeholder="Masukan Nama Promo.." name="promo_name" id="promo_name"
                                    wire:model="promo_name" autofocus>
                                @error('promo_name') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="promo_code">Kode</label>
                                <input type="text" class="form-control @error('promo_code') is-invalid @enderror"
                                    placeholder="Contoh : PRM-123ABC45.." name="promo_code" id="promo_code"
                                    wire:model="promo_code" autofocus>
                                @error('promo_code') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Discount Type And Discount Value --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="discount_type">Tipe Diskon</label>
                                <select class="form-select col-sm-12 @error('discount_type') is-invalid @enderror"
                                    id="discount_type" name="discount_type" wire:model="discount_type">
                                    <option value="" selected hidden>-- Pilih Tipe Diskon --</option>
                                    <option value="Nominal">Nominal</option>
                                    <option value="Persen">Persen</option>
                                </select>
                                @error('discount_type') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="discount_value">Nilai Diskon</label>
                                <input type="number" class="form-control @error('discount_value') is-invalid @enderror"
                                    placeholder="Persen : 1-100 %, Nominal : Contoh : 10000.. " name="discount_value"
                                    id="discount_value" wire:model="discount_value" autofocus>
                                @error('discount_value') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Start Date And End Date --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="start_date">Tanggal Mulai</label>
                                <input
                                    class="form-control digits @error('start_date') is-invalid @enderror"
                                    wire:model="start_date" type="date"
                                    placeholder="Masukan Tanggal Mulai.." style="background-color:transparent">
                                @error('start_date') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="end_date">Tanggal Selesai</label>
                                <input
                                    class="form-control digits @error('end_date') is-invalid @enderror"
                                    wire:model="end_date" type="date"
                                    placeholder="Masukan Tanggal Selesai.." style="background-color:transparent">
                                @error('end_date') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="promo_description">Deskripsi</label>
                                <textarea name="promo_description" id="promo_description" wire:model="promo_description"
                                    class="form-control @error('promo_description') is-invalid @enderror" rows="3"
                                    placeholder="Masukan Deskripsi.."></textarea>
                                @error('promo_description') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                            wire:click="closeModal">Batal</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
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
