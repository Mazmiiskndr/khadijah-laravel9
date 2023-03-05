<div class="row">
    @foreach ($products as $product )
    <div class="col-xl-3 col-sm-6 xl-4">
        <div class="card">
            <div class="product-box">
                <div class="product-img"><img class="img-fluid" src="{{ $product->thumbnail }}"
                        alt="{{ $product->product_name }}">
                    <div class="product-hover">
                        <ul>
                            <li>
                                <button class="btn" type="button"><i class="fa fa-edit"></i></button>
                            </li>
                            <li>
                                <button class="btn" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter-{{ $product->product_id }}"><i
                                        class="fa fa-eye"></i></button>
                            </li>
                            <li>
                                <button class="btn" type="button"><i class="fa fa-trash"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalCenter-{{ $product->product_id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenter-{{ $product->product_id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="product-box row">
                                    <div class="product-img col-lg-6"><img class="img-fluid"
                                            src="{{ $product->thumbnail }}" alt="{{ $product->product_name }}"></div>
                                    <div class="product-details col-lg-6 text-start">
                                        <h4>{{ $product->product_name }}</h4>
                                        <div class="product-price">${{ $product->price }}
                                            @if ($product->discount_percentage > 0)
                                            <del>${{ $product->price_with_discount }}</del>
                                            @endif
                                        </div>
                                        <div class="product-view">
                                            <h6 class="f-w-600">Product Details</h6>
                                            <p class="mb-0">{{ $product->product_description }}</p>
                                        </div>
                                        <div class="product-size">
                                            <ul>
                                                <li>
                                                    <button class="btn btn-outline-light" type="button">M</button>
                                                </li>
                                                <li>
                                                    <button class="btn btn-outline-light" type="button">L</button>
                                                </li>
                                                <li>
                                                    <button class="btn btn-outline-light" type="button">Xl</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-qnty">
                                            <h6 class="f-w-600">Quantity</h6>
                                            <fieldset>
                                                <div class="input-group">
                                                    <input class="touchspin text-center" type="text" value="5">
                                                </div>
                                            </fieldset>
                                            <div class="addcart-btn"><a class="btn btn-primary" href="cart.html">Add to
                                                    Cart</a><a class="btn btn-primary ms-2"
                                                    href="product-page.html">View
                                                    Details</a></div>
                                        </div>
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
                    </div><a href="product-page.html">
                        <h4>{{ $product->product_name }}</h4>
                    </a>
                    <p>{{ $product->product_description }}</p>
                    <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}
                        @if ($product->discount_percentage > 0)
                        <del>Rp {{ number_format($product->price_with_discount, 0, ',', '.') }}</del>
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

</div>
