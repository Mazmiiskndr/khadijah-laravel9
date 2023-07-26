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

    {{-- Start Css --}}
    <x-frontend.css />
    @stack('styles')




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
