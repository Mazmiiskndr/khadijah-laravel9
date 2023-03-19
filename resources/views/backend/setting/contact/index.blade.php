<x-backend.master title="Kontak | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Kontak</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Kontak</li>
    @endslot

    <div class="container-fluid">
        <div class="row">

            <!-- Setting Contact-->
                <div class="card">
                    <div class="card-header pb-0 card-no-border d-flex">
                        <h5>Data Kontak</h5>
                    </div>
                    <div class="card-body">
                        @livewire('backend.setting.contact.data-contact')
                    </div>
                </div>
            <!-- Setting Contact Ends-->

        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    @endpush

</x-backend.master>
