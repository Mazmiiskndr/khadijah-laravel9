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
                            <div class="text-center">
                                @for ($i = 1; $i <= 5; $i++) <i
                                    class="{{ $i <= $rating ? 'fa fa-star fa-lg text-warning' : 'fa-regular fa-lg fa-star' }}"
                                    wire:click="setRating({{ $i }})" style="cursor:pointer;"></i>
                                @endfor
                                @if ($errors->has('rating'))
                                <br>
                                <small class="text-danger">{{ $errors->first('rating') }}</small>
                                @endif
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
