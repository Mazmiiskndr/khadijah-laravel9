<div>
    {{-- Start Modal Update Produk --}}
    <!-- Update Modal Produk-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="updateProductModal" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Produk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="update" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        @csrf
                        {{-- Product Name And Category --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="product_name_update">Nama Produk</label>
                                <input type="hidden" class="form-control" name="product_id" id="product_id_update"
                                    wire:model="product_id">
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    placeholder="Masukan Nama Produk.." name="product_name" id="product_name_update"
                                    wire:model.defer="product_name" autofocus>
                                @error('product_name') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="material_update">Bahan</label>
                                <input type="text" class="form-control @error('material') is-invalid @enderror"
                                    placeholder="Masukan Bahan.." name="material" id="material_update"
                                    wire:model.defer="material" autofocus>
                                @error('material') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Category and Tag --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="category_id_update">Kategori</label>
                                <select class="select2 col-sm-12 @error('category_id') is-invalid @enderror"
                                    id="category_id_update" name="category_id" wire:model.defer="category_id">
                                    <option value="" selected>-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6" wire:ignore>
                                <label for="tag_id_update">Tag Produk</label>
                                <select class="select2 col-sm-12 @error('tag_id') is-invalid @enderror"
                                    id="tag_id_update" name="tag_id" wire:model.defer="tag_id" multiple
                                    data-placeholder="-- Pilih Tag --">
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->tag_id }}" @if(in_array($tag->tag_id, $tagsSelect)) selected
                                        @endif>{{ $tag->tag_name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('tag_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Price And Discount --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="price_update">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Masukan Harga.." name="price" id="price_update"
                                        wire:model.defer="price" autofocus>
                                </div>
                                @error('price') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="discount_update">Diskon</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                        placeholder="Masukan Diskon.." name="discount" id="discount_update"
                                        wire:model.defer="discount" autofocus>
                                </div>
                                @if($discount)
                                @error('discount') <small class="error text-danger">{{ $message }}</small> @enderror
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin memberi diskon.</small>
                                @endif
                            </div>
                        </div>

                        {{-- Length, Width and Height --}}
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="length_update">Panjang</label>
                                <input type="number" class="form-control @error('length') is-invalid @enderror" placeholder="Panjang"
                                    name="length" id="length_update" wire:model.defer="length" autofocus>
                                @error('length') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-4">
                                <label for="width_update">Lebar</label>
                                <input type="number" class="form-control @error('width') is-invalid @enderror" placeholder="Lebar" name="width"
                                    id="width_update" wire:model.defer="width" autofocus>
                                @error('width') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-4">
                                <label for="height_update">Tinggi</label>
                                <input type="number" class="form-control @error('height') is-invalid @enderror" placeholder="Tinggi"
                                    name="height" id="height_update" wire:model.defer="height" autofocus>
                                @error('height') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Type, Weight and Stock --}}
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="type_update">Type</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror" placeholder="Masukan Type.." name="type"
                                    id="type_update" wire:model.defer="type" autofocus>
                                @error('type') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-4">
                                <label for="weight_update">Berat</label>
                                <input type="text" class="form-control @error('weight') is-invalid @enderror" placeholder="Berat "
                                    name="weight" id="weight_update" wire:model.defer="weight" autofocus>
                                @error('weight') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-4">
                                <label for="stock_update">Stok</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="Masukan Stok.."
                                    name="stock" id="stock_update" wire:model.defer="stock" autofocus>
                                @error('stock') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>

                        </div>

                        {{-- Color And Size --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="color_update">Warna</label>
                                <select class="select2 col-sm-12 @error('color') is-invalid @enderror"
                                    id="color_update" name="color" wire:model.defer="color" multiple
                                    data-placeholder="-- Pilih Warna --">
                                    @foreach($colors as $color)
                                    <option value="{{ $color->color_name }}" @if(in_array($color->color_name, $colorsSelect)) selected
                                        @endif>{{ $color->color_name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('color') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="size_update">Ukuran</label>
                                <select class="select2 col-sm-12 @error('size') is-invalid @enderror" id="size_update"
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

                        {{-- Description --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="product_description_update">Deskripsi</label>
                                <textarea name="product_description" id="product_description_update"
                                    wire:model.defer="product_description"
                                    class="form-control @error('product_description') is-invalid @enderror" rows="3"
                                    placeholder="Masukan Deskripsi.."></textarea>
                                @error('product_description') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Thumbail And Product Images --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="thumbnail_update">Thumbnail</label>
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                    name="thumbnail" id="thumbnail_update" wire:model.defer="thumbnail">
                                @if ($errors->has('thumbnail'))
                                <small class="error text-danger">{{ $errors->first('thumbnail') }}</small>
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin diganti.</small>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="productImages_update">Gambar Produk</label>
                                <input type="file" class="form-control @error('productImages') is-invalid @enderror"
                                    name="productImages" id="productImages_update" wire:model="productImages" autofocus
                                    multiple>
                                @if($productImages)
                                @error('productImages.*') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin diganti.</small>
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
                            aria-label="batal">Batal</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <div wire:loading wire:target="update">Memproses...</div>
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
                Livewire.on('message.processed', (message, component) => {
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
    {{-- End Modal Update Produk --}}

</div>
