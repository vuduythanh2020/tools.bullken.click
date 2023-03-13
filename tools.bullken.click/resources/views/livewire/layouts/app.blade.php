<!DOCTYPE html>
<html lang="vi">
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
