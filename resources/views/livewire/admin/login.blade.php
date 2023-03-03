<form class="theme-form" wire:submit.prevent="loginAdmin">
    <h4>Login</h4>
    <p>Masukan Email dan Password untuk login.</p>
    <div class="form-group">
        <label class="col-form-label" for="email">Email Address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email.."
            id="email" name="email" id="email" wire:model.lazy="email" autofocus>
        @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="password">Password</label>
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Masukan password.." name="password" id="password" wire:model.laxy="password">
        @error('password') <small class="error text-danger">{{ $message }}</small> @enderror

    </div>
    <div class="form-group mb-0">
        <div class="text-end mt-3">
            <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
        </div>
    </div>
    @if (session()->has('error'))
    <script>
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
    </script>
    @endif
</form>
