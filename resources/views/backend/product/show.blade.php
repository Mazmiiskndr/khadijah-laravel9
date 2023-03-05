<x-backend.master title="Detail Produk | Khadijah">
    @push('styles')
    @endpush

    @slot('breadcrumbTitle')
    <h3>Detail Produk</h3>
    @endslot
    @slot('breadcrumbItems')
    <li class="breadcrumb-item active"><a href="{{ route('backend.product.index') }}">Produk</a></li>
    <li class="breadcrumb-item">Detail Produk</li>
    @endslot

    <!-- START DETAIL PRODUCT -->
    <div class="container-fluid">
        <div>
            <div class="row product-page-main p-0">
                <div class="col-xxl-4 col-md-6 box-col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-slider owl-carousel owl-theme" id="sync1">
                                <div class="item"><img src="../assets/images/ecommerce/01.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/02.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/03.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/04.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/05.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/06.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/07.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/08.jpg" alt=""></div>
                            </div>
                            <div class="owl-carousel owl-theme" id="sync2">
                                <div class="item"><img src="../assets/images/ecommerce/01.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/02.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/03.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/04.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/05.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/06.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/07.jpg" alt=""></div>
                                <div class="item"><img src="../assets/images/ecommerce/08.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 box-col-6 order-xxl-0 order-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-page-details">
                                <h3>Women Pink shirt.</h3>
                            </div>
                            <div class="product-price">$26.00
                                <del>$350.00 </del>
                            </div>
                            <ul class="product-color">
                                <li class="bg-primary"></li>
                                <li class="bg-secondary"></li>
                                <li class="bg-success"></li>
                                <li class="bg-info"></li>
                                <li class="bg-warning"></li>
                            </ul>
                            <hr>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at its layout. The point of using Lorem Ipsum is that.</p>
                            <hr>
                            <div>
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td> <b>Brand &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>Pixelstrap</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Availability &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td class="txt-success">In stock</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Seller &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>ABC</td>
                                        </tr>
                                        <tr>
                                            <td> <b>Fabric &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>Cotton</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="product-title">share it</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-icon">
                                        <ul class="product-social">
                                            <li class="d-inline-block"><a href="https://www.facebook.com/"
                                                    target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li class="d-inline-block"><a href="https://accounts.google.com/"
                                                    target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="d-inline-block"><a href="https://twitter.com/" target="_blank"><i
                                                        class="fa fa-twitter"></i></a></li>
                                            <li class="d-inline-block"><a href="https://www.instagram.com/"
                                                    target="_blank"><i class="fa fa-instagram"></i></a></li>
                                            <li class="d-inline-block"><a href="https://rss.app/" target="_blank"><i
                                                        class="fa fa-rss"></i></a></li>
                                        </ul>
                                        <form class="d-inline-block f-right"></form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="product-title">Rate Now</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="d-flex">
                                        <select id="u-rating-fontawesome" name="rating" autocomplete="off">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select><span>(250 review)</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="m-t-15 btn-showcase"><a class="btn btn-primary" href="cart.html" title=""> <i
                                        class="fa fa-shopping-basket me-1"></i>Add To Cart</a><a class="btn btn-success"
                                    href="checkout.html" title=""> <i class="fa fa-shopping-cart me-1"></i>Buy Now</a><a
                                    class="btn btn-secondary" href="list-wish.html"> <i class="fa fa-heart me-1"></i>Add To
                                    WishList</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6 box-col-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- side-bar colleps block stat-->
                            <div class="filter-block">
                                <h4>Brand</h4>
                                <ul>
                                    <li>Clothing</li>
                                    <li>Bags</li>
                                    <li>Footwear</li>
                                    <li>Watches</li>
                                    <li>ACCESSORIES</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="collection-filter-block">
                                <ul class="pro-services">
                                    <li>
                                        <div class="media"><i data-feather="truck"></i>
                                            <div class="media-body">
                                                <h5>Free Shipping </h5>
                                                <p>Free Shipping World Wide</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><i data-feather="clock"></i>
                                            <div class="media-body">
                                                <h5>24 X 7 Service </h5>
                                                <p>Online Service For New Customer</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><i data-feather="gift"></i>
                                            <div class="media-body">
                                                <h5>Festival Offer </h5>
                                                <p>New Online Special Festival</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><i data-feather="credit-card"></i>
                                            <div class="media-body">
                                                <h5>Online Payment </h5>
                                                <p>Contrary To Popular Belief. </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here-->
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row product-page-main">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs border-tab nav-primary mb-0" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">Febric</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Video</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                                href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="true">Details</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="brand-top-tab" data-bs-toggle="tab" href="#top-brand"
                                role="tab" aria-controls="top-brand" aria-selected="true">Brand</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <p class="mb-0 m-t-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum."</p>
                            <p class="mb-0 m-t-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum."</p>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                                software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                                software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        </div>
                        <div class="tab-pane fade" id="top-brand" role="tabpanel" aria-labelledby="brand-top-tab">
                            <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                                software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START DETAIL PRODUCT -->

    {{-- *** TODO: *** --}}
    {{-- Include livewire modal --}}
    {{-- @livewire('backend.categories.update-category') --}}
    {{-- @include('livewire.backend.categories.modal-category') --}}

    {{-- Include livewire modal --}}
    @push('scripts')
    {{-- <script>
        window.addEventListener('close-modal', event =>{
            $('#updateCategoryModal').modal('hide');
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
    </script>  --}}

    @endpush

</x-backend.master>
