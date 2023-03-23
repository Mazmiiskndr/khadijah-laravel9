<div>
    {{-- Start Button Modal Create Produk --}}
    <button class="pull-right btn btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
        <i class="fa fa-plus"></i>
        Tambah Data Produk
    </button>
    {{-- End Button Modal Create Produk --}}

    {{-- Start Modal Create Produk --}}
    <!-- Create Modal Produk-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="createProductModal" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Produk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="submit" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        {{-- Product Name And Category --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    placeholder="Masukan Nama Produk.." name="product_name" id="product_name"
                                    wire:model.defer="product_name" autofocus>
                                @error('product_name') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="material">Bahan</label>
                                <input type="text" class="form-control @error('material') is-invalid @enderror"
                                    placeholder="Masukan Bahan.." name="material" id="material"
                                    wire:model.defer="material" autofocus>
                                @error('material') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Category and Tag --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="category_id">Kategori</label>
                                <select class="select2 col-sm-12 @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id" wire:model.defer="category_id">
                                    <option value="" selected>-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6" wire:ignore>
                                <label for="tag_id">Tag Produk</label>
                                <select class="select2 col-sm-12 @error('tag_id') is-invalid @enderror" id="tag_id"
                                    name="tag_id" wire:model.defer="tag_id" multiple data-placeholder="-- Pilih Tag --">

                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->tag_id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Price And Discount --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="price">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Masukan Harga.." name="price" id="price" wire:model.defer="price"
                                        autofocus>
                                </div>
                                @error('price') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="discount">Diskon</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                        placeholder="Masukan Diskon.." name="discount" id="discount"
                                        wire:model.defer="discount" autofocus>
                                </div>
                                @if($discount)
                                @error('discount') <small class="error text-danger">{{ $message }}</small> @enderror
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin memberi diskon.</small>
                                @endif
                            </div>
                        </div>

                        {{-- Dimension And Type --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="dimension">Dimensi</label>
                                <input type="text" class="form-control @error('dimension') is-invalid @enderror"
                                    placeholder="Contoh : 100 x 110 " name="dimension" id="dimension"
                                    wire:model.defer="dimension" autofocus>
                                @error('dimension') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="type">Type</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror"
                                    placeholder="Masukan Type.." name="type" id="type" wire:model.defer="type"
                                    autofocus>
                                @error('type') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Color And Size --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="color">Warna</label>
                                <select class="select2 col-sm-12 @error('color') is-invalid @enderror" id="color"
                                    name="color" wire:model.defer="color" multiple data-placeholder="-- Pilih Warna --">
                                    @foreach($colors as $color)
                                    <option value="{{ $color->color_name }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                                @error('color') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="size">Ukuran</label>
                                <select class="select2 col-sm-12 @error('size') is-invalid @enderror" id="size"
                                    name="size" wire:model.defer="size" multiple data-placeholder="-- Pilih Ukuran --">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                    <option value="Super Jumbo">Super Jumbo</option>
                                    <option value="Semua Ukuran">Semua Ukuran</option>
                                </select>
                                @error('size') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Weight And Stock --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="weight">Berat</label>
                                <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                    placeholder="Contoh : 4.30 " name="weight" id="weight" wire:model.defer="weight"
                                    autofocus>
                                @error('weight') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="stock">Stok</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                    placeholder="Masukan Stok.." name="stock" id="stock" wire:model.defer="stock"
                                    autofocus>
                                @error('stock') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="product_description">Deskripsi</label>
                                <textarea name="product_description" id="product_description"
                                    wire:model.defer="product_description"
                                    class="form-control @error('product_description') is-invalid @enderror" rows="3"
                                    placeholder="Masukan Deskripsi.."></textarea>
                                @error('product_description') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Thumbail And Product Images --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                    name="thumbnail" id="thumbnail" wire:model.defer="thumbnail" autofocus>
                                @error('thumbnail') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="productImages">Gambar Produk</label>
                                <input type="file" class="form-control @error('productImages') is-invalid @enderror"
                                    name="productImages" id="productImages" wire:model.defer="productImages" autofocus
                                    multiple>
                                @if($productImages)
                                @error('productImages.*') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                                @else
                                <small class="text-danger">Gambar Produk bisa lebih dari satu.</small>
                                @endif
                                <div class="">
                                    <small class="text-primary" wire:loading wire:target="productImages">Sedang
                                        upload...</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" wire:click="closeModal"
                            aria-label="batalCreate">Batal</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                        <div wire:loading wire:target="submit" class="text-success">Memproses...</div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        (function($){
            $(document).on('livewire:load', function() {
                $('.select2').select2()
                $('select[name="category_id"]').on('change', function(){
                    @this.category_id = $(this).val()
                })
                $('select[name="tag_id"]').on('change', function(){
                    @this.tag_id = $(this).val()
                })
                $('select[name="color"]').on('change', function(){
                    @this.color = $(this).val()
                })
                $('select[name="size"]').on('change', function(){
                    @this.size = $(this).val()
                })
                Livewire.hook('message.processed', (message, component) => {
                    $('.select2').select2();
                })
            })
        })(jQuery)
    </script>
    @endpush

    @if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        })

    </script>
    @endif
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
    {{-- End Modal Create Produk --}}

</div>
