<div>
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetVars"><span aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img"><img src="{{ asset('storage/'.$thumbnail) }}" alt=""
                                    class="img-fluid blur-up lazyload"></div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>{{ $product_name }}</h2>
                                <div class="d-flex">
                                    <h3>Rp. {{ number_format($price - $discount, 0, ',', '.') }}</h3>
                                    @if ($discount > 0)
                                    <del style="margin-left: 10px;"> Rp. {{ number_format($price, 0, ',', '.')
                                        }}</del>
                                    @endif
                                </div>
                                <div class="mb-1 color-box-detail" id="color-box2">
                                    {{-- TODO: Change to Select Color --}}
                                    <ul wire:ignore.self>
                                        @foreach ($colors as $indexColor => $color)
                                        <li wire:ignore.self>
                                            <a id="color-box-link" href="javascript:void(0)"
                                                wire:click="$set('selectedColor', '{{ $color }}')"
                                                class="btn btn-outline btn-sm btn-xs me-1 mt-2" wire:ignore.self>{{
                                                $color }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @error('selectedColor') <small class="error text-danger">{{ $message }}</small>
                                @enderror
                                <div class="border-product">
                                    <h6 class="product-title">Deskripsi</h6>
                                    <p>{{ $product_description }}</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box-detail mb-2">
                                        {{-- TODO: Change to Select Size --}}
                                        <ul wire:ignore.self>
                                            @foreach ($size as $size)
                                            <li wire:ignore.self><a href="javascript:void(0)"
                                                    class="btn btn-outline btn-sm btn-xs me-1 mt-2"
                                                    wire:click="$set('selectedSize', '{{ $size }}')" wire:ignore.self>{{
                                                    $size }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @error('selectedSize') <small class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1">
                                            <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <a href="javascript:void(0)" wire:click="addToCart('{{ $productUid }}')" class="add-to-cart-button btn btn-solid btn-animation">
                                        <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i>
                                    </a>

                                    @if($product_slug)
                                    <a href="{{ route('product.show', ['product' => $product_slug ]) }}"
                                        class="btn btn-solid ">
                                        <i class="fa fa-eye me-1" aria-hidden="true"></i>
                                    </a>
                                    @else
                                    <a href="#" class="btn btn-solid">
                                        <i class="fa fa-eye me-1" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    @push('scripts')
    <script src="{{ asset('assets/cart/add-to-cart.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var plusBtn = document.querySelector(".quantity-right-plus");
            var minusBtn = document.querySelector(".quantity-left-minus");
            var quantityField = document.querySelector("input[name='quantity']");

            plusBtn.addEventListener("click", function (e) {
                e.preventDefault();

                var quantity = parseInt(quantityField.value);

                if (!isNaN(quantity)) {
                    quantityField.value = quantity + 1;
                    @this.set('quantity', quantity + 1);
                }
            });

            minusBtn.addEventListener("click", function (e) {
                e.preventDefault();

                var quantity = parseInt(quantityField.value);

                if (quantity > 1) {
                quantityField.value = quantity - 1;
                @this.set('quantity', quantity - 1);
                }
            });
        });
    </script>
    @endpush
</div>
