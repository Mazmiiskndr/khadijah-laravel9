<div>
    <!-- Update Modal Tag-->
    <div wire:ignore.self class="modal fade" id="updateTagModal" tabindex="-1" role="dialog"
        aria-labelledby="updateTagModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="tag_name_input">Nama Kategori</label>
                            <input type="hidden" class="form-control" name="tag_id" id="tag_id"
                                wire:model="tag_id">
                            <input type="text" class="form-control @error('tag_name') is-invalid @enderror"
                                placeholder="Masukan Nama Kategori.." name="tag_name" id="tag_name_input"
                                wire:model="tag_name" autofocus>
                            @error('tag_name') <small class="error text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="tag_description_input">Deskripsi</label>
                            <textarea class="form-control @error('tag_description') is-invalid @enderror"
                                name="tag_description" id="tag_description_input"
                                wire:model="tag_description" rows="3" placeholder="Masukan Deskripsi.."></textarea>
                            @error('tag_description') <small class="error text-danger">{{ $message }}</small>
                            @enderror
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
