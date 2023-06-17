<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mukena Khadijah">
    <meta name="keywords" content="Mukan Khadijah | Mukena Murah">
    <meta name="author" content="Moch Azmi Iskandar">
    {{-- Start Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon_khadijah.png') }}" />
    {{-- End Favicon --}}
    <title>Invoice - Khadijah Label</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <style>
        .table-bordered tbody, .table-bordered td, .table-bordered tfoot, .table-bordered th, .table-bordered thead,
        .table-bordered tr {
            border-color: rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="col-sm-12">
        <div class="card" style="margin-bottom: 0px">
            <div class="card-body">
                <div class="invoice">
                    <div>
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media">
                                        <div class="media-left"><img class="media-object img-60"
                                                src="{{ asset('assets/images/favicon_khadijah.png') }}" alt=""></div>
                                        <div class="media-body m-l-20 text-right">
                                            <h4 class="media-heading">Khadijah Label</h4>
                                            <p>{{ $contact->email }}<br><span>{{ $contact->phone }}</span></p>
                                        </div>
                                    </div>
                                    <!-- End Info-->
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-md-end text-xs-center">
                                        <h3>Invoice #<span class="counter">1069</span></h3>
                                        <p>Issued: May<span> 27, 2015</span><br> Payment Due: June
                                            <span>27, 2015</span>
                                        </p>
                                    </div>
                                    <!-- End Title-->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- End InvoiceTop-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="media-left"><img class="media-object rounded-circle img-60"
                                            src="../assets/images/user/1.jpg" alt=""></div>
                                    <div class="media-body m-l-20">
                                        <h4 class="media-heading">Johan Deo</h4>
                                        <p>JohanDeo@gmail.com<br><span>555-555-5555</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="text-md-end" id="project">
                                    <h6>Project Description</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.It is a long established fact that a
                                        reader will be distracted by the readable content of a page
                                        when looking at its layout.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Invoice Mid-->
                        <div>
                            <div class="table-responsive invoice-table" id="table">
                                <table class="table table-bordered table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="item">
                                                <h6 class="p-2 mb-0">Item Description</h6>
                                            </td>
                                            <td class="Hours">
                                                <h6 class="p-2 mb-0">Hours</h6>
                                            </td>
                                            <td class="Rate">
                                                <h6 class="p-2 mb-0">Rate</h6>
                                            </td>
                                            <td class="subtotal">
                                                <h6 class="p-2 mb-0">Sub-total</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Lorem Ipsum</label>
                                                <p class="m-0">Lorem Ipsum is simply dummy text of
                                                    the printing and typesetting industry.</p>
                                            </td>
                                            <td>
                                                <p class="itemtext">5</p>
                                            </td>
                                            <td>
                                                <p class="itemtext">$75</p>
                                            </td>
                                            <td>
                                                <p class="itemtext">$375.00</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Lorem Ipsum</label>
                                                <p class="m-0">Lorem Ipsum is simply dummy text of
                                                    the printing and typesetting industry.</p>
                                            </td>
                                            <td>
                                                <p class="itemtext">3</p>
                                            </td>
                                            <td>
                                                <p class="itemtext">$75</p>
                                            </td>
                                            <td>
                                                <p class="itemtext">$225.00</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="Rate">
                                                <h6 class="mb-0 p-2">Total</h6>
                                            </td>
                                            <td class="payment">
                                                <h6 class="mb-0 p-2">$3,644.25</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table-->
                            <div class="row">
                                <div class="col-md-8">
                                    <div>
                                        <p class="legal">
                                            <small><strong>Terima kasih telah berbelanja di Khadijah Label!</strong> Pesanan mukena Anda sedang diproses dan akan segera
                                            dikirim. Kami
                                            berkomitmen menyediakan mukena berkualitas tinggi untuk menambah khusyu' ibadah Anda. Jika butuh bantuan, jangan
                                            ragu menghubungi kami. <strong>Selamat beribadah!</strong></small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 text-end">
                                    <button class="btn btn btn-primary me-2" type="button"
                                        onclick="window.print();">Cetak</button>
                                    <button class="btn btn-secondary" type="button" onclick="javascript:window.history.back(-1);return false;">Kembali</button>
                                </div>
                            </div>
                        </div>
                        <!-- End InvoiceBot-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- latest jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- Plugin used-->
</body>

</html>
