<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mukena Khadijah">
    <meta name="keywords" content="Mukena Khadijah | Mukena Murah">
    <meta name="author" content="pixelstrap">
    {{-- Start Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon_khadijah.png') }}" />
    {{-- End Favicon --}}
    <title>{{ $title ?? config('app.name') }}</title>
    {{-- Styles CSS --}}
    <x-auth.admin.css />
    @stack('styles')
    {{-- End Styles CSS --}}
    @livewireStyles
</head>

<body>
    <div class="container-fluid p-0">
        {{-- Start Login Page --}}
        {{ $slot }}
        {{-- End Login Page --}}
    </div>

    {{-- Scripts --}}
    <x-auth.admin.script />
    @stack('script')
    {{-- End Scripts --}}
    @livewireScripts
</body>

</html>
