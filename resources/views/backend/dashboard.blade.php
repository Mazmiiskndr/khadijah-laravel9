@push('styles')
@endpush
<x-backend.master title="Dashboard | Khadijah">
    @slot('breadcrumbTitle')
    <h3>Dashboard</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active">Dashboard</li>
    @endslot

    {{-- START MAIN CONTENT --}}
    <div class="container-fluid">
        <div class="row widget-grid">
            {{-- START WIDGET --}}
            @livewire('backend.dashboard.widget')
            {{-- END WIDGET --}}

            {{-- START CHART JS --}}
            @livewire('backend.dashboard.chart')
            {{-- END CHART JS --}}

        </div>
    </div>
    {{-- END MAIN CONTENT --}}
    @push('scripts')

    @endpush
</x-backend.master>
