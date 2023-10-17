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
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-serif antialiased">
        
        <div class="min-h-screen bg-gray-100">

          
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        
        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
