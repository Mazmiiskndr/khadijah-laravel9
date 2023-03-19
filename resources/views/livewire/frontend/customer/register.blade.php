<form wire:submit.prevent="submit">
    @csrf
    {{-- Name and Email --}}
    <div class="row">
        <div class="col">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama.."
                name="name" id="name" wire:model="name" autofocus>
            @error('name') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col">
            <label for="phone">No. Telepon/Wa</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="No. Telepon/Wa.."
                name="phone" id="phone" wire:model="phone">
            @error('phone') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email.."
                name="email" id="email" wire:model="email" autofocus>
            @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Masukan password.." name="password" id="password" wire:model.laxy="password">
            @error('password') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    {{-- Link Customer Login --}}
    <div class="ml-1 mt-1">
        <a href="{{ route('customer.login') }}" class="text-primary"><small>Sudah punya Akun?</small></a>
    </div>

    <div class="text-center">
        <button class="btn" type="submit">Register</button>
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
