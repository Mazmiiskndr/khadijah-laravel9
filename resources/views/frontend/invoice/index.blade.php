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
        @livewire('frontend.invoice.detail-invoice',['orderUid' => $orderUid])
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
