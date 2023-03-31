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
    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles
    <!--Google font-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet"> --}}

    {{-- Start Css --}}
    <x-frontend.css />
    @stack('styles')
    {{-- End Css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />




</head>

<body class="theme-color-1">

    <!-- Start Header -->
    <x-frontend.header/>
    <!-- End Header -->


    {{-- Start Content --}}
    {{ $slot }}
    {{-- End Content --}}

    <!-- Start Header -->
    <x-frontend.footer/>
    <!-- End Header -->

    {{-- Start Script --}}
    <x-frontend.script />
    {{-- End Script --}}

    {{-- Start Stack Scripts --}}
    @stack('scripts')
    {{-- End Stack Scripts --}}

    {{-- Start Livewire Scripts --}}
    @livewireScripts
    {{-- End Livewire Scripts --}}

</body>

</html>
