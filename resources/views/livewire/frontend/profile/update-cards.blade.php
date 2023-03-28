<div>
    <!-- Update Modal Rekening-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="updateRekeningModal" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pembayaran / Rekening Bank</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeRekeningModal"></button>
                </div>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        @csrf

                        {{-- METODE PEMBAYARAN --}}
                        <div class="row">
                            <div class="col-12">
                                <label for="provider_update">Metode Pembayaran</label>
                                <input type="hidden" class="form-control" name="rekening_id" id="rekening_id" wire:model="rekening_id">
                                <select name="provider" id="provider_update"
                                    class="form-select @error('provider') is-invalid @enderror" wire:model="provider">
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
                                <label for="rekening_name_update">Nama Rekening</label>
                                <input type="text" class="form-control @error('rekening_name') is-invalid @enderror"
                                    placeholder="Masukan Nama Rekening.." name="rekening_name" id="rekening_name_update"
                                    wire:model="rekening_name">
                                @error('rekening_name') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- NOMOR REKENING --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="rekening_number_update">Nomor Rekening</label>
                                <input type="number" class="form-control @error('rekening_number') is-invalid @enderror"
                                    placeholder="Masukan Nomor Rekening.." name="rekening_number" id="rekening_number_update"
                                    wire:model="rekening_number">
                                @error('rekening_number') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" aria-label="batal" type="button" data-bs-dismiss="modal"
                            wire:click="closeRekeningModal">Batal</button>
                        <button class="btn btn-primary" type="submit" aria-label="submit">Update</button>
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
