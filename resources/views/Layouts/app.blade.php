<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Take Back Manufacturing') }}</title>
        {!! SEOMeta::generate() !!}
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
    <body class="font-serif antialiased {{ bodyClass() }}" >
        
        <div class="min-h-screen bg-white">
            {{-- <x-header /> --}}
          
            <!-- Page Content -->
            <main>
                <div class="container mx-auto flex px-4 md:px-4">
                <x-sidebar />
                <div class="w-full sm:w-full md:w-4/6 lg:w-4/5 px-5 flex lg:py-5">
                    {{ $slot }}
                </div>
                </div>
                
                
            </main>
        </div>

        <footer class="flex mt-4 container px-4 md:px-0 mb-10 md:mb-4 lg:mb-10 mx-auto">
            <div class="hidden lg:block w-1/5"></div>
            <div class="w-full lg:w-4/5">
                <p class="md:pl-4 lg:pl-0 text-sm text-center md:text-left">© Copyright {{ now()->year }} <span class="text-red-600 font-bold">NIGEL SOUTHWAY</span>. All Rights Reserved.</p>
            </div>
            
        </footer>
        
        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
