<div class="page-header">
    <div class="header-wrapper row m-0">
        {{-- END SEARCH FORM --}}
        <div class="header-logo-wrapper col-auto p-0">
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                {{-- START PROFILE DROPDOWN --}}
                @livewire('backend.header.profile-dropdown')
                {{-- END PROFILE DROPDOWN --}}

            </ul>

        </div>
    </div>
</div>
{{-- START PROFILE DROPDOWN --}}
@livewire('backend.header.update-profile')
{{-- END PROFILE DROPDOWN --}}

@push('scripts')
<script>
    window.addEventListener('close-modal', event =>{
        $('#updateUserModal').modal('hide');
    });
</script>

@endpush
