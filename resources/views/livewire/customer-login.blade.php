<form wire:submit.prevent="submit" method="POST">
    @csrf
    {{-- *** TODO: *** --}}


    {{-- @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif --}}
    <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email.." name="email" id="email"
            wire:model.lazy="email" autofocus>
        @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan password.." name="password" id="password"
            wire:model.laxy="password">
        @error('password') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="text-center">
        <button class="btn" type="submit" >Login</button>
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
</form>

{{-- <div class="alert alert-danger">
    {{ session('error') }}
</div> --}}
