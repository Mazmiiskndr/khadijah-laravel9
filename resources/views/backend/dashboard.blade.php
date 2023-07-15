<x-backend.master title="Dashboard | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    @endpush
    @slot('breadcrumbTitle')
    <h3>Dashboard</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active">Dashboard</li>
    @endslot

    {{-- START MAIN CONTENT --}}
    <div class="container-fluid">
        <div class="row widget-grid">
            <div class="row">
                {{-- START WIDGET --}}
                @livewire('backend.dashboard.widget')
                {{-- END WIDGET --}}
            </div>
            <div class="row">
                {{-- START CHART INCOME --}}
                @livewire('backend.dashboard.chart-income')
                {{-- END CHART INCOME --}}
            </div>

            <div class="row">
                {{-- START CHART VISITOR --}}
                @livewire('backend.dashboard.chart-visitor')
                {{-- END CHART VISITOR --}}
                {{-- START DATATABLE SALES --}}
                @livewire('backend.dashboard.data-table')
                {{-- END DATATABLE SALES --}}
            </div>

        </div>
    </div>
    {{-- END MAIN CONTENT --}}
    @push('scripts')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    @endpush
</x-backend.master>
