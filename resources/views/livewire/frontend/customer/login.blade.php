<form wire:submit.prevent="submit" method="POST" class="theme-form">
    @csrf

    {{-- EMAIL AND PASSWORD --}}
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email.."
            name="email" id="email" wire:model.lazy="email" autofocus>
        @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Masukan Kata Sandi.." name="password" id="password" wire:model.laxy="password">
        @error('password') <small class="error text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-solid" type="submit">Masuk</button>

    @push('scripts')
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
    @if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        })
    </script>
    @endif
    @if (session()->has('notlogin'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('notlogin') }}',
        });
    </script>
    @endif
    @endpush

</form>

{{-- <form class="theme-form">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Email" required="">
    </div>
    <div class="form-group">
        <label for="review">Password</label>
        <input type="password" class="form-control" id="review" placeholder="Enter your password" required="">
    </div>


</form> --}}

{{-- <div class="alert alert-danger">
    {{ session('error') }}
</div> --}}
