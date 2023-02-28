<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $title ?? config('app.name') }}</title>
    {{-- Start Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon_khadijah.png') }}" />
    {{-- End Favicon --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Start Css --}}
    <x-frontend.css />
    {{-- End Css --}}

    @stack('styles')
    @livewireStyles
</head>

<body class="has-smround-btns has-loader-bg equal-height">

    {{-- Start Header --}}
    <x-frontend.header />

    <div class="header-side-panel">

        <!-- Start Mobile Menu -->
        <x-frontend.header-mobile />
        <!-- End Mobile Menu -->

        <!-- Start Side Panel -->
        <x-frontend.side-panel />
        <!-- End Side Panel -->

    </div>
    {{-- End Header --}}

    {{-- Start Content --}}
    {{ $slot }}
    {{-- End Content --}}

    {{-- Start Footer --}}
    <x-frontend.footer />
    {{-- End Footer --}}

    {{-- Start Footer Sticky --}}
    <x-frontend.footer-sticky />
    {{-- End Footer Sticky --}}


    {{-- Start Script --}}
    <x-frontend.script />
    {{-- End Script --}}
    @livewireScripts
    @stack('scripts')
</body>

</html>
