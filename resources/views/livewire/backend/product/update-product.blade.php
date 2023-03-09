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
                <form wire:submit.prevent="update" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        {{-- Product Name And Category --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="product_name">Nama Produk</label>
                                <input type="hidden" class="form-control" name="product_id" id="product_id" wire:model="product_id">
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
                                {{-- {{ dd($tag_id) }} --}}
                                <select class="select2 col-sm-12 @error('tag_id') is-invalid @enderror" id="tag_id"
                                    name="tag_id" wire:model.defer="tag_id" multiple data-placeholder="-- Pilih Tag --">
                                        @foreach($tags as $tag)
                                        <option value="{{ $tag->tag_id }}" @if(in_array($tag->tag_id, $tagsSelect)) selected @endif>{{ $tag->tag_name }}
                                        </option>
                                        @endforeach
                                </select>
                                @error('tag_id') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Price And Discount --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Masukan Harga.." name="price" id="price" wire:model.defer="price"
                                    autofocus>
                                @error('price') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="discount">Diskon</label>
                                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                    placeholder="Masukan Diskon.." name="discount" id="discount"
                                    wire:model.defer="discount" autofocus>
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
                                <input type="text" class="form-control @error('color') is-invalid @enderror"
                                    placeholder="Masukan Warna.. " name="color" id="color" wire:model.defer="color"
                                    autofocus>
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
                                    class="form-control @error('weight') is-invalid @enderror" rows="3"
                                    placeholder="Masukan Deskripsi.."></textarea>
                                @error('weight') <small class="error text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Thumbail And Product Images --}}
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                    name="thumbnail" id="thumbnail" wire:model="thumbnail" autofocus>
                                @if ($errors->has('thumbnail'))
                                <small class="error text-danger">{{ $errors->first('thumbnail') }}</small>
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin diganti.</small>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="productImages">Gambar Produk</label>
                                <input type="file" class="form-control @error('productImages') is-invalid @enderror"
                                    name="productImages" id="productImages" wire:model="productImages" autofocus
                                    multiple>
                                @if ($errors->has('productImages'))
                                <small class="error text-danger">{{ $errors->first('productImages') }}</small>
                                @else
                                <small class="text-danger">Kosongkan jika tidak ingin diganti.</small>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                            wire:click="closeModal">Batal</button>
                        <button class="btn btn-primary" type="submit">Update</button>
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
    {{-- End Modal Update Produk --}}

</div>
