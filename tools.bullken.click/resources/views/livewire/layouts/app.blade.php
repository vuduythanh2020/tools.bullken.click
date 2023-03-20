<!DOCTYPE html>
<html lang="vi">
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/body-auto-height.js'])
    @livewireStyles
</head>
<body>
    <livewire:header />
    <div>
        @yield('content')
    </div>

    <livewire:footer />
    @livewireScripts
</body>
</html>
