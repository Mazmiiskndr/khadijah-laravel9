<div>
    <!-- Create Rating Modals-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="createRating" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Silahkan Beri Penilaian</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeRatingModal"></button>
                </div>
                <form wire:submit.prevent="storeRating">
                    <div class="modal-body">
                        @csrf
                        {{-- TODO: --}}
                        {{-- GIVE RATINGS --}}
                        <div class="row">
                            <div class="">
                                <label for="subject">Rating</label>
                                <br>
                                @for ($i = 1; $i <= 5; $i++) <i
                                    class="{{ $i <= $rating ? 'fa fa-star fa-lg text-warning' : 'fa-regular fa-lg fa-star' }}"
                                    wire:click="setRating({{ $i }})" style="cursor:pointer;font-size:1.5em;"></i>
                                @endfor
                                @if ($errors->has('rating'))
                                <br>
                                <small class="text-danger">{{ $errors->first('rating') }}</small>
                                @endif
                            </div>
                        </div>
                        {{-- FORM INPUT COMMENT --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="subject">Judul</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    placeholder="Masukan Judul.." name="subject" id="subject" wire:model="subject">
                                @error('subject') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        {{-- FORM INPUT COMMENT --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="comment">Komentar</label>
                                <textarea name="comment" id="" cols="3" class="form-control @error('comment') is-invalid @enderror"
                                    wire:model="comment" placeholder="Masukan Komentar.."></textarea>
                                @error('comment') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" aria-label="batal" type="button" data-bs-dismiss="modal"
                            wire:click="closeRatingModal">Batal</button>
                        <button class="btn btn-primary" type="submit" aria-label="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#createRating').modal('hide');
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
