<li class="profile-nav onhover-dropdown pe-0 py-0">
    <div class="media profile-media"><img class="b-r-10" src="{{ asset('assets/images/users/default.png') }}"
            alt="Images" width="35">
        <div class="media-body"><span>{{ Auth::user()->name }}</span>
            <p class="mb-0 font-roboto">{{ Auth::user()->email }} <i class="middle fa fa-angle-down"></i></p>
        </div>
    </div>
    <ul class="profile-dropdown onhover-show-div">
        <li wire:click="getUser({{ Auth::user()->id }})" data-bs-toggle="modal" data-bs-target="#updateUserModal">
            <a href="#">
                <i data-feather="user"></i>
                <span>Akun </span>
            </a>
        </li>
        {{-- <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
        <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
        <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li> --}}

        <li>
            <form id="form-logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="logoutButton();">
                    <i data-feather="log-out"> </i>
                    <span>Keluar</span>
                </a>
            </form>
        </li>
    </ul>
</li>



@push('scripts')
<script>
    function logoutButton() {
        // var form = $(this).closest("form");
        event.preventDefault();
        // console.log(id);
        Swal.fire({
            title: 'Anda yakin ingin keluar?',
            text: "Anda tidak akan dapat mengakses data lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector("#form-logout").submit();
            }
        });
    }
</script>
@endpush
