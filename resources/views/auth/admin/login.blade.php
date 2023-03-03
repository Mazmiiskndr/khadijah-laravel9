<x-auth.admin.master title="Halaman Login">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div>
                            <a class="logo" href="{{ route('index') }}">
                                <img class="img-fluid for-light"
                                    src="{{  asset('assets/images/logo/khadijah-label.png')  }}" alt="looginpage" width="300">
                            </a>
                        </div>
                        <div class="login-main">
                            @livewire('admin.login')
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-auth.admin.master>
