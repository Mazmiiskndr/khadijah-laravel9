<form wire:submit.prevent="store" method="POST">
    @csrf
    <div class="form-group">
        <label for="category_name">Nama Kategori</label>
        <input type="text" class="form-control @error('category_name') is-invalid @enderror"
            placeholder="Masukan Nama Kategori.." name="category_name" id="category_name"
            wire:model.lazy="category_name" autofocus>
        @error('category_name') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group mt-3">
        <label for="category_description">Deskripsi</label>
        <textarea class="form-control @error('category_description') is-invalid @enderror" name="category_description"
            id="category_description" wire:model.laxy="category_description" rows="3"
            placeholder="Masukan Deskripsi.."></textarea>
        @error('category_description') <small class="error text-danger">{{ $message }}</small> @enderror
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
