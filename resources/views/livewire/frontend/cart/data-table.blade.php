<div class="col-sm-12 table-responsive">
    <table class="table cart-table">
        <thead>
            <tr class="table-head">
                <th>Nama Produk</th>
                <th style="width:10px;">Warna</th>
                <th style="width:10px;">Ukuran</th>
                <th>Harga</th>
                <th>Kuantitas</th>
                <th>Aksi</th>
                <th>Total</th>
            </tr>
        </thead>
        @php
        $subtotal = 0;
        @endphp
        @foreach ($carts as $cart)
        @php
        $totalPerPrice = $cart->quantity * $cart->product->price;
        @endphp
        <tbody>
            <tr>
                <td><a style="color:black"
                        href="{{ route('product.show', ['product' => $cart->product->product_slug]) }}">{{
                        $cart->product->product_name }}</a>
                    <div class="mobile-cart-content row">
                        <div class="col">
                            <div class="qty-box">
                                <div class="input-group">
                                    <input type="number" name="quantity" class="form-control input-number" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="td-color">Rp. {{ number_format($cart->product->price - $cart->product->discount,
                                0, ',', '.') }}</h4>
                        </div>
                        <div class="col">
                            <h2 class="td-color">
                                <a href="javascript:void(0)" class="icon"
                                    wire:click="deleteCart('{{ $cart->cart_uid }}')">
                                    <i class="ti-close"></i>
                                </a>
                            </h2>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="javascript:void(0)" style="color:black">{{ $cart->color }}</a>
                </td>
                <td>
                    <a href="javascript:void(0)" style="color:black">{{ $cart->size }}</a>
                </td>
                <td>
                    <h4 style="color:black"><b>Rp. {{ number_format($cart->product->price - $cart->product->discount, 0,
                            ',', '.') }}</b></h4>
                </td>
                <td>
                    {{-- TODO: CHANGE QTY INPUT --}}
                    <div class="qty-box">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""
                                    data-id="{{ $cart->cart_id }}">
                                    <i class="ti-angle-left"></i>
                                </button>
                            </span>
                            <input type="text" name="quantity" class="form-control input-number"
                                value="{{ $cart->quantity }}" data-id="{{ $cart->cart_id }}">
                            <span class="input-group-prepend">
                                <button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""
                                    data-id="{{ $cart->cart_id }}">
                                    <i class="ti-angle-right"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="javascript:void(0)" class="icon" wire:click="deleteCart('{{ $cart->cart_uid }}')">
                        <i class="ti-close"></i>
                    </a>
                </td>
                <td>
                    <h4 class="td-color">
                        <b>
                            @if ($cart->product->discount > 0)
                            Rp. {{ number_format($totalPerPrice - $cart->product->discount, 0, ',', '.') }}
                            @else
                            Rp. {{ number_format($totalPerPrice, 0, ',', '.') }}
                            @endif
                        </b>
                    </h4>
                </td>
            </tr>
        </tbody>
        {{-- Count Sub Total --}}
        @php
        if ($cart->product->discount > 0){
        $subtotal += $totalPerPrice - $cart->product->discount;
        }else{
        $subtotal += $totalPerPrice;
        }
        @endphp

        @endforeach

    </table>
    <div class="table-responsive">
        <table class="table cart-table ">
            <tfoot>
                <tr>
                    <td>Total Harga :</td>
                    <td>
                        <h4 style="margin-top: 10px;"><b>Rp. {{ number_format($subtotal, 0, ',', '.') }}</b></h4>
                    </td>
                </tr>
            </tfoot>
        </table>
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
    <script>
        // Adding an event listener for when the content is loaded
        document.addEventListener("DOMContentLoaded", function () {
            // Function to update the quantity of a product
            function updateQuantity(id, change) {
                // Selecting the quantity input field using the data-id attribute
                const quantityField = document.querySelector(`input[data-id='${id}']`);
                // Parsing the value of the input field as an integer
                const currentQuantity = parseInt(quantityField.value);

                // Checking if the parsed value is a valid number
                if (!isNaN(currentQuantity)) {
                    // Calculating the new quantity based on the change value
                    const newQuantity = currentQuantity + change;

                    // Ensuring the new quantity is greater than 0 before updating the input field
                    if (newQuantity > 0) {
                        // Updating the input field value with the new quantity
                        quantityField.value = newQuantity;
                        // Calling the Livewire updateQuantity function with the new quantity
                        @this.call('updateQuantity', id, newQuantity);
                    }
                }
            }

            // Looping through all the elements with the class .quantity-right-plus
            document.querySelectorAll(".quantity-right-plus").forEach((plusBtn) => {
                // Adding a click event listener for each plus button
                plusBtn.addEventListener("click", function (e) {
                    // Preventing the default button click behavior
                    e.preventDefault();
                    // Getting the data-id attribute value from the button
                    const id = this.getAttribute('data-id');
                    // Calling the updateQuantity function to increase the quantity by 1
                    updateQuantity(id, 1);
                });
            });

            // Looping through all the elements with the class .quantity-left-minus
            document.querySelectorAll(".quantity-left-minus").forEach((minusBtn) => {
                // Adding a click event listener for each minus button
                minusBtn.addEventListener("click", function (e) {
                    // Preventing the default button click behavior
                    e.preventDefault();
                    // Getting the data-id attribute value from the button
                    const id = this.getAttribute('data-id');
                    // Calling the updateQuantity function to decrease the quantity by 1
                    updateQuantity(id, -1);
                });
            });
        });
    </script>
    @endpush
</div>
