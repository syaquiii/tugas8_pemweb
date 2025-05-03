@include('partials.alerts')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel CRUD Books') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-['Inter'] antialiased bg-gray-900 text-gray-100 min-h-screen flex flex-col">
    <!-- Animated background -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-purple-900 to-violet-900 opacity-20"></div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
    </div>

    <nav class="bg-gray-800/80 backdrop-blur-md border-b text-white border-gray-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('books.index') }}" class="text-2xl font-bold text-red-200 flex items-center">
                        <i class="fas fa-book-open mr-2"></i>
                        Syauqi Library
                    </a>

                    <div class="hidden md:flex space-x-6">
                        <a href="{{ route('books.index') }}"
                            class="nav-link px-1 py-2 text-sm font-medium {{ request()->routeIs('books.index') ? 'text-white active' : 'text-gray-300' }}">
                            <i class="fas fa-list mr-1"></i> Daftar Buku
                        </a>
                        <a href="{{ route('books.create') }}"
                            class="nav-link px-1 py-2 text-sm font-medium {{ request()->routeIs('books.create') ? 'text-white active' : 'text-gray-300' }}">
                            <i class="fas fa-plus-circle mr-1"></i> Tambah Buku
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-300 hover:text-white focus:outline-none"
                        id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden bg-gray-800/95 backdrop-blur-md" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('books.index') }}"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('books.index') ? 'text-white bg-gray-900/50' : 'text-gray-300' }}">
                    <i class="fas fa-list mr-2"></i> Daftar Buku
                </a>
                <a href="{{ route('books.create') }}"
                    class="nav-link block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('books.create') ? 'text-white bg-gray-900/50' : 'text-gray-300' }}">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Buku
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="notification-success mb-6">
                    <i class="fas fa-check-circle mr-3 text-xl"></i>
                    <div>
                        <p class="font-semibold">Success!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                    <button class="ml-auto focus:outline-none" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer
        class="bg-gradient-to-t from-gray-900/80 via-gray-900/40 to-transparent py-8 mt-12 border-t border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                    <i class="fab fa-github text-xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
            </div>
            <p class="text-gray-400 text-sm">
                © {{ date('Y') }} Syauqi Library. All rights reserved.
            </p>
            <p class="text-gray-500 text-xs mt-1">
                Made with <i class="fas fa-heart text-rose-500"></i> by Syauqi
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function (event) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');

            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>