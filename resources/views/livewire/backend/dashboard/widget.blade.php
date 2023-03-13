<div class="col-12">
    <div class="row">
        <div class="col-xxl-6 col-sm-6 box-col-6">
            <div class="card profile-box">
                <div class="card-body">
                    <div class="media media-wrapper">
                        <div class="media-body">
                            <div class="greeting-user">
                                <h4 class="f-w-600">Selamat Datang di Khadijah Label</h4>
                                <p>Rasakan kenyamanan beribadah dengan mukena Khadijah Label.</p>
                                <div class="whatsnew-btn"><a href="{{ route('backend.product.index') }}"
                                        class="btn btn-outline-white">Produk Terbaru !</a></div>
                            </div>
                        </div>
                        <div>
                            <div class="clockbox">
                                <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                                    <g id="face">
                                        <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                        <path class="hour-marks"
                                            d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6">
                                        </path>
                                        <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                    </g>
                                    <g id="hour">
                                        <path class="hour-hand" d="M300.5 298V142"></path>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                    </g>
                                    <g id="minute">
                                        <path class="minute-hand" d="M300.5 298V67"> </path>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                    </g>
                                    <g id="second">
                                        <path class="second-hand" d="M300.5 350V55"></path>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"> </circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="badge f-10 p-0" id="txt"></div>
                        </div>
                    </div>
                    <div class="cartoon"><img class="img-fluid" src="{{ asset('assets/images/dashboard/cartoon.svg') }}"
                            alt="vector women with leptop">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-sm-6 box-col-6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card widget-1">
                        <div class="card-body">
                            <div class="widget-content">
                                <div class="widget-round secondary">
                                    <div class="bg-round">
                                        <svg class="svg-fill">
                                            <use href="../assets/svg/icon-sprite.svg#cart"> </use>
                                        </svg>
                                        <svg class="half-circle svg-fill">
                                            <use href="../assets/svg/icon-sprite.svg#halfcircle"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4>10,000</h4><span class="f-light">Purchase</span>
                                </div>
                            </div>
                            <div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+50%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round primary">
                                        <div class="bg-round">
                                            <svg class="svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#tag"> </use>
                                            </svg>
                                            <svg class="half-circle svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#halfcircle"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>4,200</h4><span class="f-light">Sales</span>
                                    </div>
                                </div>
                                <div class="font-primary f-w-500"><i
                                        class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-sm-6 box-col-6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card widget-1">
                        <div class="card-body">
                            <div class="widget-content">
                                <div class="widget-round warning">
                                    <div class="bg-round">
                                        <svg class="svg-fill">
                                            <use href="../assets/svg/icon-sprite.svg#return-box"> </use>
                                        </svg>
                                        <svg class="half-circle svg-fill">
                                            <use href="../assets/svg/icon-sprite.svg#halfcircle"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4>7000</h4><span class="f-light">Sales return</span>
                                </div>
                            </div>
                            <div class="font-warning f-w-500"><i class="icon-arrow-down icon-rotate me-1"></i><span>-20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round success">
                                        <div class="bg-round">
                                            <svg class="svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#rate"> </use>
                                            </svg>
                                            <svg class="half-circle svg-fill">
                                                <use href="../assets/svg/icon-sprite.svg#halfcircle"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>5700</h4><span class="f-light">Purchase rate</span>
                                    </div>
                                </div>
                                <div class="font-success f-w-500"><i
                                        class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
