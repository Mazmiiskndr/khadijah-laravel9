<div>
        <div class="mb-1 color-box2">
            {{-- TODO: Change to Select Color --}}
            <ul wire:ignore>
                @foreach ($colors as $indexColor => $color)
                <li>
                    <a href="javascript:void(0)" wire:click="$set('selectedColor', '{{ $color }}')"
                        class="btn btn-outline btn-sm btn-xs me-1 mt-2">{{ $color }}</a>
                </li>
                @endforeach
            </ul>
            @error('selectedColor') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
        <div id="selectSize" class="addeffect-section product-description border-product">
            <h6 class="product-title size-text">Ukuran</h6>
            {{-- *** TODO: DESCRIPTION UKURAN --}}
            <h6 class="error-message" >Pilih Ukuran</h6>
            <div class="size-box2 mb-2">
                {{-- TODO: Change to Select Size --}}
                <ul wire:ignore>
                    @foreach ($sizes as $size)
                    <li><a href="javascript:void(0)" class="btn btn-outline btn-sm btn-xs me-1 mt-2" wire:click="$set('selectedSize', '{{ $size }}')">{{ $size }}</a>
                    </li>
                    @endforeach
                </ul>
                @error('selectedSize') <small class="error text-danger">{{ $message }}</small> @enderror
            </div>
            <h6 class="product-title">Kuantitas</h6>
            <div class="d-flex">
                <div class="qty-box">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="">
                                <i class="ti-angle-left"></i>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number" value="{{ $quantity }}"
                            wire:model="quantity">
                        <span class="input-group-prepend">
                            <button type="button" class="btn quantity-right-plus" data-type="plus" data-field="">
                                <i class="ti-angle-right"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <p style="margin-left: 15px;margin-top:15px;">Tersisa {{ $stock }} buah</p>
            </div>
        </div>
        <div class="product-buttons">
            <button id="addToCart" type="submit" wire:click="addToCart('{{ $productUid }}')" class="btn btn-solid btn-animation">
                <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i>
                Tambah ke Keranjang
            </button>
            <a href="#" class="btn btn-solid">
                <i class="fa fa-heart fz-16 me-2" aria-hidden="true"></i>
                Favorit
            </a>
        </div>

    @if (session()->has('success'))
    <script>
        // disable selected state on size and color buttons
        $('.size-box2 ul li').removeClass('selected');
        $('.size-box2 ul li a').removeClass('active');
        $('.color-box2 ul li').removeClass('selected');
        $('.color-box2 ul li a').removeClass('active');
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

    <script>
        $(document).ready(function () {
            $(".quantity-right-plus").click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($("input[name='quantity']").val());
                // If is not undefined
                // Increment
                if (!isNaN(quantity)) {
                    $("input[name='quantity']").val(quantity + 1);
                    @this.set('quantity', quantity + 1);
                }
            });
            $(".quantity-left-minus").click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($("input[name='quantity']").val());
                // If is not undefined
                // Increment
                if (quantity > 1) {
                    $("input[name='quantity']").val(quantity - 1);
                    @this.set('quantity', quantity - 1);
                }
            });
        });
    </script>
    @endpush
</div>
