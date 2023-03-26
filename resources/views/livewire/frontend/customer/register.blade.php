<div class="theme-card">
    <form wire:submit.prevent="submit" class="theme-form">
        @csrf
        {{-- Name and Email --}}
        <div class="row">
            <div class="col-md-6">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama.."
                    name="name" id="name" wire:model="name" autofocus>
                @error('name') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
                <label for="phone">No. Telepon/Wa</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="No. Telepon/Wa.."
                    name="phone" id="phone" wire:model="phone">
                @error('phone') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email.."
                    name="email" id="email" wire:model="email" autofocus>
                @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
                <label for="password">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukan Kata Sandi.." name="password" id="password" wire:model.laxy="password">
                @error('password') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="text-left mt-3">
            <button class="btn btn-solid w-auto" type="submit">Daftar</button>
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
</div>
{{-- <div class="alert alert-danger">
    {{ session('error') }}
</div> --}}
