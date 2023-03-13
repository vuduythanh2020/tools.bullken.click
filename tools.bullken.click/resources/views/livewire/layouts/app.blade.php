<!DOCTYPE html>
<html lang="vi">
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <livewire:header />
    <div>
        @yield('content')
    </div>

    <div>
        @livewire('footer')
    </div>

    @livewireScripts
</body>
</html>
