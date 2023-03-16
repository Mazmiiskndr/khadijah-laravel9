<x-backend.master title="Laporan Produk | Khadijah">
    @push('styles')
    @endpush

    @slot('breadcrumbTitle')
    <h3>Data Laporan Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Laporan Produk</li>
    @endslot

    <div class="container-fluid">
        {{-- TODO: --}}
        <!--begin::Repeater-->
        <div id="kt_docs_repeater_basic">
            <!--begin::Form group-->
            <div class="form-group">
                <div data-repeater-list="kt_docs_repeater_basic">
                    <div data-repeater-item>
                        <div class="form-group row mt-2">
                            <div class="col-md-3">
                                <label class="form-label">Name:</label>
                                <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Number:</label>
                                <input type="email" class="form-control mb-2 mb-md-0"
                                    placeholder="Enter contact number" />
                            </div>
                            <div class="col-md-4 mt-2">
                                <a style="display:none; margin-top:20px;" href="javascript:;" id="delete-button" data-repeater-delete class="btn btn-sm btn-danger" >
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Form group-->

            <!--begin::Form group-->
            <div class="form-group mt-2">
                <a href="javascript:;" data-repeater-create class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
            <!--end::Form group-->
        </div>
        <!--end::Repeater-->
    </div>

    {{-- *** TODO: *** --}}
    {{-- START UPDATE MODAL PROMO --}}
    {{-- @livewire('backend.promo.update-promo') --}}
    {{-- END UPDATE MODAL PROMO --}}
    @push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script>
        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).find('#delete-button').show();
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
    {{-- *** TODO: *** --}}
    {{-- START DATATABLE --}}
    {{-- <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> --}}
    {{-- END DATATABLE --}}
    {{-- <script>
        window.addEventListener('close-modal', event =>{
            $('#createPromoModal').modal('hide');
            $('#updatePromoModal').modal('hide');
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
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script> --}}

    @endpush

</x-backend.master>
