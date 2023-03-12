<div>
    <!-- Create Modal Users-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="updateUserModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Akun</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        @csrf
                        {{-- Name And Email --}}
                        <div class="row">
                            <div class="col-12">
                                <label for="email_input_profile">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email.."
                                    name="email" id="email_input_profile" wire:model="email" autofocus>
                                @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <label for="name_input_profile">Nama</label>
                                <input type="hidden" class="form-control" name="id" id="id"
                                    wire:model="id">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Masukan Nama.." name="name" id="name_input_profile" wire:model="name"
                                    autofocus>
                                @error('name') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>

                        </div>
                        {{-- Password and Number Phone --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="password_input_profile">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukan Password.." name="password" id="password_input_profile"
                                    wire:model="password" autofocus>
                                @if($password)
                                @error('password') <small class="error text-danger">{{ $message }}</small> @enderror
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin diganti.</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                            wire:click="closeModal">Batal</button>
                        <button class="btn btn-primary" type="submit">Update</button>
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
