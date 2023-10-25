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
        

        <!-- Styles -->
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body class="font-serif antialiased {{ bodyClass() }}">
        
        <div class="min-h-screen bg-white">
            {{-- <x-header /> --}}
          
            <!-- Page Content -->
            <main>
                <div class="container mx-auto flex">
                <x-sidebar />
                <div class="w-4/5 px-5 flex py-5">
                    {{ $slot }}
                </div>
                </div>
                
                
            </main>
        </div>

        
        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
