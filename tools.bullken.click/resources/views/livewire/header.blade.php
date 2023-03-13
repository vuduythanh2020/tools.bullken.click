<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center py-4">
        <div class="flex items-center">
            <a href="{{ route('home') }}">
                <img class="h-8" src="{{ asset('img/logo.png') }}" alt="Logo">
            </a>
        </div>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="{{ route('home') }}">Repeat Request</a>
        </nav>
    </div>
</header>
