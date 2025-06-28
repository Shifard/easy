<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-dm bg-yellowish">

<header class="header shadow-md z-100 relative" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3)">
    <div class="w-full flex justify-between items-center px-6 py-6 md:px-12">
      <!-- Logo -->
        <div class="w-full flex  items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" class="w-6 h-auto" alt="Logo">
            <h1 class="text-2xl md:text-3xl font-light gray-color">Easy</h1>
        </div>

        <!-- Hamburger Menu Button -->
        <div class="md:hidden">
            <button id="hamburger" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Links (Desktop) -->
        @if (Route::has('login'))
        <nav class="hidden md:flex space-x-4 items-center">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-blue-100 hover:text-blue-600 font-medium">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="gray-bg font-semibold text-xs text-white px-6 py-3 rounded-full hover:bg-gray-700 transition duration-300 delay-100">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="gray-bg font-semibold text-xs text-white px-6 py-3 rounded-full hover:bg-gray-700 transition duration-300 delay-100">Register</a>
                @endif
            @endauth
        </nav>
        @endif
    </div>

    <!-- Mobile Menu -->
    @if (Route::has('login'))
    <div id="mobileMenu" class="hidden flex-col px-6 space-y-2 pb-4 md:hidden transition-all duration-300">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-blue-100 hover:text-blue-600 font-medium">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="gray-bg font-semibold text-white px-4 py-2 rounded-full text-sm hover:bg-gray-700 transition duration-300 delay-100">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="gray-bg font-semibold text-white px-4 py-2 rounded-full text-sm hover:bg-gray-700 transition duration-300 delay-100">Register</a>
            @endif
        @endauth
    </div>
    @endif
</header>

<main class="relative">
    <div class="fixed right-0 top-1/3 -translate-y-1/2 pt-8 z-[-1]">
        <img src="{{ asset('images/design.png') }}" class="w-160 md:w-224 h-192 opacity-30" alt="Design">
    </div>

    <div class="w-full fixed left-0 px-6 md:px-12 py-6" style="bottom: 7.5rem">
        <h2 class="text-4xl md:text-8xl font-bold mb-5 gray-color">Blogging Made Easy</h2>
        <p class="font-bold hero-subtitle">
            Discover bite-sized stories and share your thoughts without the hassle. Just read, write, and enjoy.
        </p>
    </div>
</main>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('flex');
    });
</script>

</body>
</html>
