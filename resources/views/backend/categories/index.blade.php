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
                        @livewire('backend.categories.create-category')
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
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ substr($category->category_description, 0, 25) }}...</td>
                                        <td>
                                            <a href="#" class="btn btn-pill btn-primary"><i class="fa fa-edit"></i></a>
                                            </li>
                                            <a href="#" class="btn btn-pill btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Categories Ends-->
        </div>
    </div>
    @push('scripts')
    @endpush
</x-backend.master>
