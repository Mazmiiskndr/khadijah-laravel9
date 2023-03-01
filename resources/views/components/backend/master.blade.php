<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

    {{-- Start Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon_khadijah.png') }}" />
    {{-- End Favicon --}}
    <title>{{ $title ?? config('app.name') }}</title>
    <!-- Google font-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet"> --}}
    {{-- @include('backend.css') --}}
    <x-backend.css />

    {{--
    <x-backend.css /> --}}
    {{-- @yield('style') --}}
    @stack('styles')
    @livewireStyles
</head>
{{-- @dd(Route::current()->getName()); --}}

<body @if(Route::current()->getName() == 'index') @elseif (Route::current()->getName() ==
    'button-builder') class="button-builder" @endif @class(['dark-sidebar'])>
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page Header Start-->
        {{-- @include('backend.header') --}}
        <x-backend.header />
        <!-- Page Header Ends  -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            {{-- @include('backend.sidebar') --}}
            <x-backend.sidebar />
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                {{-- @yield('breadcrumb-title') --}}
                                @isset($breadcrumbTitle)
                                {{ $breadcrumbTitle }}
                                @endisset
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('backend.dashboard')}}">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    {{-- @yield('breadcrumb-items') --}}
                                    @isset($breadcrumbItems)
                                    {{ $breadcrumbItems }}
                                    @endisset
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                {{-- @yield('content') --}}
                {{ $slot }}
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            {{-- @include('backend.footer') --}}
            <x-backend.footer />
            <!-- footer end-->

        </div>
    </div>

    <!-- latest jquery-->
    <x-backend.script />
    {{-- @include('backend.script') --}}
    @stack('scripts')
    <!-- Plugin used-->
    @livewireScripts
</body>

</html>
