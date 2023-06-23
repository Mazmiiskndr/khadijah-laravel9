<x-backend.master title="Bank | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Bank</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Bank</li>
    @endslot

    <div class="container-fluid">
        <div class="row">

            <!-- Setting Bank-->
            <div class="card">
                <div class="card-header pb-0 card-no-border d-flex">
                    <h5>Data Bank</h5>
                </div>
                <div class="card-body">
                    @livewire('backend.setting.bank.data-bank')
                </div>
            </div>
            <!-- Setting Bank Ends-->

        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    @endpush

</x-backend.master>
