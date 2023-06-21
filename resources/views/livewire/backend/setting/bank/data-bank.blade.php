<form wire:submit.prevent="update">
    @csrf
    {{-- PROVIDER, REKENING NAME AND REKENING NUMBER --}}
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="provider">Provider</label>
                <input type="text" class="form-control @error('provider') is-invalid @enderror"
                    placeholder="Masukan Nama Toko.." name="provider" id="provider" wire:model="provider">
                @error('provider') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="rekening_name">Nama Rekening</label>
                <input type="text" class="form-control @error('rekening_name') is-invalid @enderror"
                    placeholder="Masukan Nama Rekening.." name="rekening_name" id="rekening_name"
                    wire:model="rekening_name">
                @error('rekening_name') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="rekening_number">No. Rekening</label>
                <input type="number" class="form-control @error('rekening_number') is-invalid @enderror"
                    placeholder="Masukan No. Rekening.." name="rekening_number" id="rekening_number"
                    wire:model="rekening_number">
                @error('rekening_number') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    <div class="card-footer text-end">
        <button class="btn btn-lg btn-pill btn-primary" type="submit">Update</button>
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
</form>
