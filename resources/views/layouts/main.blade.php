<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>

    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/cfececaf03.js" crossorigin="anonymous"></script>
    <livewire:styles />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="fonts-sans bg-gray-900 text-white">

    <nav class="border-b bg-gray-900 border-gray-800 sticky top-0 z-50" >
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}">
                        <i class="fa-solid fa-clapperboard"></i>
                        Movie App
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('tv.index') }}" class="hover:text-gray-300">Tv</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown>
                <div class="ml-0 md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img  class="rounded-full w-10 h-10" src="/img/photo (3).jpg" alt="Avator">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts />
    @yield('scripts')
</body>
</html>