<div>
    <div class="top-sec">
        <h3>Pembayaran / Rekening Bank</h3>
        <button class="btn btn-sm btn-solid" data-bs-toggle="modal" data-bs-target="#createRekeningModal">
            + Tambah baru
        </button>
    </div>

    <!-- Create Modal Rekening-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="createRekeningModal" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pembayaran / Rekening Bank</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeRekeningModal"></button>
                </div>
                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        @csrf

                        {{-- METODE PEMBAYARAN --}}
                        <div class="row">
                            <div class="col-12">
                                <label for="provider">Metode Pembayaran</label>
                                <select name="provider" id="provider" class="form-select @error('provider') is-invalid @enderror" wire:model="provider">
                                    <option value="">-- Pilih Metode Pembayaran --</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="GOPAY">GOPAY</option>
                                    <option value="OVO">OVO</option>
                                    <option value="DANA">DANA</option>
                                    <option value="ALFAMART">ALFAMART</option>
                                    <option value="INDOMART">INDOMART</option>
                                </select>
                                @error('provider') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- NAMA REKENING --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="rekening_name">Nama Rekening</label>
                                <input type="text" class="form-control @error('rekening_name') is-invalid @enderror"
                                    placeholder="Masukan Nama Rekening.." name="rekening_name" id="rekening_name" wire:model="rekening_name">
                                @error('rekening_name') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- NOMOR REKENING --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="rekening_number">Nomor Rekening</label>
                                <input type="number" class="form-control @error('rekening_number') is-invalid @enderror"
                                    placeholder="Masukan Nomor Rekening.." name="rekening_number" id="rekening_number" wire:model="rekening_number">
                                @error('rekening_number') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" aria-label="batal" type="button" data-bs-dismiss="modal"
                            wire:click="closeRekeningModal">Batal</button>
                        <button class="btn btn-primary" type="submit" aria-label="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        (function($){
                $(document).on('livewire:load', function() {
                    Livewire.hook('message.processed', (message, component) => {
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
