<div>
    <!-- Create Payment Modals-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="createPayment" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lakukan Pembayaran</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closePaymentModal"></button>
                </div>
                <form wire:submit.prevent="storePayment">
                    <div class="modal-body">
                        @csrf

                        @if(count($rekening) > 0)
                        <label for="rekening">Pilih Rekening</label>
                        <select name="rekening" id="rekening" class="form-select" wire:model="selectedRekening">
                            <option value="">-- Pilih Rekening --</option>
                            @foreach($rekening as $rek)
                            <option value="{{ $rek->id }}">{{ $rek->provider }} - {{ $rek->rekening_name }} - {{ $rek->rekening_number }}</option>
                            @endforeach
                        </select>
                        @else
                        {{-- METODE PEMBAYARAN --}}
                        <div class="row">
                            <div class="col-12">
                                <label for="provider">Metode Pembayaran</label>
                                <select name="provider" id="provider" class="form-select @error('provider') is-invalid @enderror"
                                    wire:model="provider">
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
                                    placeholder="Masukan Nomor Rekening.." name="rekening_number" id="rekening_number"
                                    wire:model="rekening_number">
                                @error('rekening_number') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        @endif
                        {{-- UPLOAD BUKTI PEMBAYARAN --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="payment_proof">Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control @error('payment_proof') is-invalid @enderror" name="payment_proof" id="payment_proof"
                                    wire:model="payment_proof">
                                @error('payment_proof') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" aria-label="batal" type="button" data-bs-dismiss="modal"
                            wire:click="closePaymentModal">Batal</button>
                        <button class="btn btn-primary" type="submit" aria-label="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
                    $('#createPayment').modal('hide');
                });
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
