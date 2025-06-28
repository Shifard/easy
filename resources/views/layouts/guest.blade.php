<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <style>
            /* Custom styles to match the design */
            .brand-purple { color: #5D548C; }
            .bg-brand-purple { background-color: #5D548C; }
            .hover\:bg-brand-purple-dark:hover { background-color: #4a4370; }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background-color: #F7F5F0;">

        <!-- Header/Navigation -->
        <header class="w-full px-4 sm:px-8 md:px-12 py-6">
            <nav class="flex items-center justify-between max-w-7xl mx-auto">
                <!-- Logo -->
                <a href="/" wire:navigate class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" class="w-6 h-auto" alt="Logo">
                    <h1 class="text-3xl font-light gray-color">Easy</h1>
                </a>

                <!-- Register Button -->
                <a href="{{ route('register') }}" wire:navigate class="bg-brand-purple text-white font-semibold py-2 px-6 rounded-full hover:bg-brand-purple-dark transition duration-300">
                    Register
                </a>
            </nav>
        </header>
        
        <!-- This is where the Livewire component (e.g., your login form) will be injected -->
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>