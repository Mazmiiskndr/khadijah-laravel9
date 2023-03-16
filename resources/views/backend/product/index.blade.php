<x-backend.master title="Produk | Khadijah">
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/range-slider.css') }}">
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Produk</li>
    @endslot

    <!-- Container-fluid starts-->
    <div class="container-fluid product-wrapper">
        <div class="product-grid">
            <div class="feature-products">
                <div class="row">
                    <div class="col-md-4 products-total">

                        {{-- START SQUARE PRODUCT --}}
                        <x-backend.product.square-product />
                        {{-- END SQUARE PRODUCT --}}
                        <div class="grid-options d-inline-block">
                            {{-- START GRID OPTIONS --}}
                            <x-backend.product.grid-option />
                            {{-- END GRID OPTIONS --}}
                        </div>

                    </div>
                    <div class="col-md-5 text-sm-end">
                        {{-- START SHOWING PRODUCT --}}
                        @livewire('backend.product.showing-product')
                        {{-- END SHOWING PRODUCT --}}
                    </div>

                    <div class="col-md-3">
                        <div class="mr-3">
                            {{-- *** TODO: SAMPLE *** --}}
                            {{-- <a class="pull-right btn btn-pill btn-primary" href="{{ route('backend.product.create') }}">
                                <i class="fa fa-plus"></i>
                                Tambah Data Produk
                            </a> --}}

                            {{-- START CREATE BUTTON PRODUCT --}}
                            @livewire('backend.product.create-product')
                            {{-- END CREATE BUTTON PRODUCT --}}

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="product-sidebar">
                            <div class="filter-section">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0 f-w-600">Filter
                                            <span class="pull-right">
                                                <i class="fa fa-chevron-down toggle-data"></i>
                                            </span>
                                        </h6>
                                    </div>

                                    <div class="left-filter">

                                        {{-- START FILTER PRODUCT --}}
                                        @livewire('backend.product.filter-product')
                                        {{-- END FILTER PRODUCT --}}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        {{-- START SEARCH PRODUCT --}}
                        @livewire('backend.product.search-product')

                        {{-- END SEARCH PRODUCT --}}

                    </div>
                </div>
            </div>
            <div class="product-wrapper-grid">
                {{-- START PRODUCT PAGE --}}
                @livewire('backend.product.card-product')
                {{-- END PRODUCT PAGE --}}
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    {{-- *** TODO: *** --}}
    {{-- Include livewire modal --}}
    @livewire('backend.product.update-product')
    {{-- @include('livewire.backend.categories.modal-category') --}}

    {{-- Include livewire modal --}}
    @push('scripts')
    @if (session()->has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif
    <script>
        window.addEventListener('close-modal', event =>{
            $('#createProductModal').modal('hide');
        });
        window.addEventListener('close-modal-update', event =>{
            $('#updateProductModal').modal('hide');
        });
        window.addEventListener('delete-show-confirmation', event =>{
            Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Anda tidak akan dapat mengembalikan data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmation');
                }
            })
        });
    </script>

    {{-- <script src="{{ asset('assets/js/range-slider/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/range-slider/rangeslider-script.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/product-tab.js') }}"></script>

    @endpush

</x-backend.master>
