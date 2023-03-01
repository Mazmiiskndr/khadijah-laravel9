<x-backend.master title="Kategori | Khadijah">
    @push('styles')
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Kategori</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Kategori</li>
    @endslot

    <div class="container-fluid">
        <div class="row">
            <!-- Add Categories-->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header pb-0 card-no-border d-flex">
                        <h5>Tambah Data Kategori</h5>
                    </div>
                    <div class="card-body">
                        @livewire('backend.categories.create-category', ['categories' => $categories])
                    </div>
                </div>
            </div>
            <!-- Add Categories Ends-->
            <!-- Data Categories-->
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header pb-0 card-no-border d-flex">
                        <h5>Data Kategori</h5>
                    </div>
                    <div class="card-body">
                        @livewire('backend.categories.datatable-category')
                    </div>
                </div>
            </div>
            <!-- Data Categories Ends-->
        </div>
    </div>
    @push('scripts')
    @endpush

</x-backend.master>
