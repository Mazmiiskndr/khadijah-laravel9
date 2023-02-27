<div class="dropdn-content account-drop" id="dropdnAccount">
    <div class="dropdn-content-block">
        <div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
        <ul>
            <li><a href="{{ route('login') }}"><span>Log In</span><i class="icon-login"></i></a></li>
            <li><a href="account-create.html"><span>Register</span><i class="icon-user2"></i></a></li>
            <li><a href="checkout.html"><span>Checkout</span><i class="icon-card"></i></a></li>
        </ul>
        <div class="dropdn-form-wrapper">
            <h5>Quick Login</h5>
            <form action="#">
                <div class="form-group">
                    <input type="text" class="form-control form-control--sm is-invalid" placeholder="Enter your e-mail">
                    <div class="invalid-feedback">Can't be blank</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control--sm" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn">Enter</button>
            </form>
        </div>
    </div>
    <div class="drop-overlay js-dropdn-close"></div>
</div>
<div class="dropdn-content minicart-drop" id="dropdnMinicart">
    <div class="dropdn-content-block">
        <div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
        <div class="minicart-drop-content js-dropdn-content-scroll">
            <div class="minicart-prd row">
                <div class="minicart-prd-image image-hover-scale-circle col">
                    <a href="product.html"><img class="lazyload fade-up"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                            data-src="images/skins/fashion/products/product-01-1.jpg" alt=""></a>
                </div>
                <div class="minicart-prd-info col">
                    <div class="minicart-prd-tag">FOXic</div>
                    <h2 class="minicart-prd-name"><a href="#">Leather Pegged Pants</a></h2>
                    <div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span
                            class="minicart-prd-qty-value">1</span></div>
                    <div class="minicart-prd-price prd-price">
                        <div class="price-old">$200.00</div>
                        <div class="price-new">$180.00</div>
                    </div>
                </div>
                <div class="minicart-prd-action">
                    <a href="#" class="js-product-remove" data-line-number="1"><i class="icon-recycle"></i></a>
                </div>
            </div>
            <div class="minicart-prd row">
                <div class="minicart-prd-image image-hover-scale-circle col">
                    <a href="product.html"><img class="lazyload fade-up"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                            data-src="images/skins/fashion/products/product-16-1.jpg" alt=""></a>
                </div>
                <div class="minicart-prd-info col">
                    <div class="minicart-prd-tag">FOXic</div>
                    <h2 class="minicart-prd-name"><a href="#">Cascade Casual Shirt</a></h2>
                    <div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span
                            class="minicart-prd-qty-value">1</span></div>
                    <div class="minicart-prd-price prd-price">
                        <div class="price-old">$200.00</div>
                        <div class="price-new">$180.00</div>
                    </div>
                </div>
                <div class="minicart-prd-action">
                    <a href="#" class="js-product-remove" data-line-number="2"><i class="icon-recycle"></i></a>
                </div>
            </div>
            <div class="minicart-empty js-minicart-empty d-none">
                <div class="minicart-empty-text">Your cart is empty</div>
                <div class="minicart-empty-icon">
                    <i class="icon-shopping-bag"></i>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262"
                        style="enable-background:new 0 0 306 262;" xml:space="preserve">
                        <path class="st0"
                            d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" />
                    </svg>
                </div>
            </div>
            <a href="#" class="minicart-drop-countdown mt-3">
                <div class="countdown-box-full">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto"><i class="icon-gift icon--giftAnimate"></i></div>
                        <div class="col">
                            <div class="countdown-txt">WHEN BUYING TWO
                                THINGS A THIRD AS A GIFT
                            </div>
                            <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="minicart-drop-info d-none d-md-block">
                <div class="shop-feature-single row no-gutters align-items-center">
                    <div class="shop-feature-icon col-auto"><i class="icon-truck"></i></div>
                    <div class="shop-feature-text col"><b>SHIPPING!</b> Continue shopping to add more products
                        and receive free shipping</div>
                </div>
            </div>
        </div>
        <div class="minicart-drop-fixed js-hide-empty">
            <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span>
            </div>
            <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
                <div class="minicart-drop-total-txt col-auto heading-font">Subtotal</div>
                <div class="minicart-drop-total-price col" data-header-cart-total="">$340</div>
            </div>
            <div class="minicart-drop-actions">
                <a href="cart.html" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>Cart
                        Page</span></a>
                <a href="checkout.html" class="btn btn--md"><i class="icon-checkout"></i><span>Check
                        out</span></a>
            </div>
            <ul class="payment-link mb-2">
                <li><i class="icon-amazon-logo"></i></li>
                <li><i class="icon-visa-pay-logo"></i></li>
                <li><i class="icon-skrill-logo"></i></li>
                <li><i class="icon-klarna-logo"></i></li>
                <li><i class="icon-paypal-logo"></i></li>
                <li><i class="icon-apple-pay-logo"></i></li>
            </ul>
        </div>
    </div>
    <div class="drop-overlay js-dropdn-close"></div>
</div>
