<form wire:submit.prevent="store" class="form-inline subscribe-form auth-form needs-validation" method="post">
    <div class="form-group mx-sm-3">

        <input type="text" class="form-control @error('email_subscriber') is-invalid @enderror" name="email_subscriber" id="email_subscriber" placeholder="Masukan Email.."
            wire:model.lazy="email_subscriber">
            @error('email_subscriber') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <button type="submit" class="btn btn-solid" id="mc-submit1">Langganan</button>
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
