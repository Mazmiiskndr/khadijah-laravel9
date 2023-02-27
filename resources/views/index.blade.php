@push('styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}"> --}}
@endpush
<x-layouts.master title="Test">
    @slot('breadcrumbTitle')
    <h3>Dashboard</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active">Dashboard</li>
    @endslot

</x-layouts.master>

@push('scripts')
<script type="text/javascript">
    var session_layout = '{{ session()->get('layout') }}';
</script>
@endpush
