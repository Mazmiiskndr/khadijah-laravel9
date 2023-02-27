@push('styles')
@endpush
<x-backend.master title="Dashboard | Khadijah">
    @slot('breadcrumbTitle')
    <h3>Dashboard</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active">Dashboard</li>
    @endslot

</x-backend.master>

@push('scripts')

@endpush
