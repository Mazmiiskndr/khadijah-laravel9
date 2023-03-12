<form wire:submit.prevent="store" method="POST">
    @csrf
    <div class="form-group">
        <label for="tag_name">Nama Label</label>
        <input type="text" class="form-control @error('tag_name') is-invalid @enderror"
            placeholder="Masukan Nama Label.." name="tag_name" id="tag_name"
            wire:model.lazy="tag_name" autofocus>
        @error('tag_name') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group mt-3">
        <label for="tag_description">Deskripsi</label>
        <textarea class="form-control @error('tag_description') is-invalid @enderror" name="tag_description"
            id="tag_description" wire:model.laxy="tag_description" rows="3"
            placeholder="Masukan Deskripsi.."></textarea>
        @error('tag_description') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group mt-3">
        <button class="btn btn-sm btn-primary d-block btn-block" type="submit">Tambah</button>
    </div>
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
