<div class="row">
    @foreach ($products as $product )
    <div class="col-xl-3 col-sm-6 xl-4">
        <div class="card">
            <div class="product-box">
                <div class="product-img">
                    {{-- @if ($product->discount > 0)
                    <div class="ribbon ribbon-warning">{{ round(($product->discount / $product->price) * 100) }}%</div>
                    @endif --}}
                    @if ($product->stock == 0 )
                    <div class="ribbon ribbon-danger">Stok Kosong</div>
                    @endif

                    <img class="img-fluid" src="{{ asset('storage/'.$product->thumbnail) }}"
                        style="width:450px;" alt="{{ $product->product_name }}">
                    <div class="product-hover">
                        <ul>
                            <li>
                                <button class="btn" type="button"><i class="fa fa-edit"></i></button>
                            </li>
                            <li data-bs-toggle="modal" data-bs-target="#exampleModalCenter-{{ $product->product_id }}">
                                <button class="btn" type="button"><i class="fa fa-eye"></i></button>
                            </li>
                            <li wire:click="deleteConfirmation({{ $product->product_id }})">
                                <button class="btn" type="button"><i class="fa fa-trash"></i></button>
                            </li>
                            <li onclick="detailProduct({{ $product->product_id }})">
                                <button class="btn"
                                    type="button"><i
                                        class="fa fa-link"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- *** TODO: *** --}}
                <div class="modal fade" id="exampleModalCenter-{{ $product->product_id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenter-{{ $product->product_id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="product-box row">
                                    <div class="product-img col-lg-6"><img class="img-fluid"
                                            src="{{ asset('storage/'.$product->thumbnail) }}"
                                            alt="{{ $product->product_name }}">
                                    </div>

                                    <div class="product-details col-lg-6 text-start">
                                        <h4>{{ $product->product_name }} </h4>

                                        <div class="product-price">Rp. {{ number_format($product->price -
                                            $product->discount, 0, ',', '.') }}
                                            @if ($product->discount > 0)
                                            <del>Rp. {{ number_format($product->price, 0, ',', '.') }}</del>
                                            <small>{{ round(($product->discount / $product->price) * 100) }}%</small>
                                            @endif
                                        </div>
                                        <h6 class="f-w-600">Stok :
                                            @if($product->stock == 0)
                                            <button class="btn btn-sm btn-outline-danger" type="button">
                                                <b>{{ $product->stock }}</b>
                                            </button>
                                            @else
                                            <button class="btn btn-sm btn-outline-dark" type="button">
                                                <b>{{ $product->stock }}</b>
                                            </button>
                                            @endif

                                        </h6>

                                        <div class="product-view">
                                            <h6 class="f-w-600">Product Details</h6>
                                            <p class="mb-0">{{ $product->product_description }}</p>

                                        </div>
                                        <div class="product-size">
                                            <h6 class="f-w-600">Ukuran</button></h6>
                                            {{-- Explode Sizes --}}
                                            @php
                                            $sizes = explode(',', $product->size);
                                            @endphp
                                            <ul>
                                                @foreach ($sizes as $size)
                                                <li>
                                                    <button class="btn btn-outline-dark" type="button">{{ $size
                                                        }}</button>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>

                                        {{-- *** TODO: *** --}}
                                        {{-- <div class="product-qnty">
                                            <div class="addcart-btn">
                                                <a class="btn btn-primary" href="cart.html">Add to Cart</a>
                                                <a class="btn btn-primary ms-2"
                                                    href="{{ route('backend.product.show', ['product' => $product->product_id]) }}">View
                                                    Details</a>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-details">
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div><a href="{{ route('backend.product.show', ['product' => $product->product_id]) }}">
                        <h4>{{ $product->product_name }}</h4>
                    </a>
                    @if($product->product_description)
                    <td>{{ substr($product->product_description, 0, 80) }}...</td>
                    @else
                    <td> - </td>
                    @endif
                    {{-- <p>{{ $product->product_description }}</p> --}}
                    <div class="product-price">Rp. {{ number_format($product->price - $product->discount, 0, ',', '.')
                        }}
                        @if ($product->discount > 0)
                        <del>Rp. {{ number_format($product->discount, 0, ',', '.') }}</del>
                        <small>({{ round(($product->discount / $product->price) * 100) }}%)</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endforeach
    <div class="d-flex justify-content-center my-3">
        {{ $products->links() }}
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
        function detailProduct(id) {
            window.location.href = "{{ route('backend.product.show', ['product' => ':id']) }}".replace(':id', id);
        }
    </script>
    @endpush

</div>
