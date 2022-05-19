<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content="PPI Bandirma is organization of indonesian student who study in Bandirma, Türkiye">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">

        <!-- Icon -->
        <link rel="shortcut icon" href="logo.png" type="image/x-icon">

        @livewireStyles

        <!-- Scripts -->

        <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        </style>
        
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased ">
        

        <div class="min-h-screen relative">
            @livewire('components.navbar')


            <!-- Page Content -->
            <main class="bg-gray-100">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        
        <footer>
                <div class="pt-2 pb-16 md:pb-4 text-center text-gray-100 bg-slate-900">© 2022 Copyright: PPI Bandirma. </div>
        </footer>

        <script>
        if (document.getElementById('nav-mobile-btn')) {
            document.getElementById('nav-mobile-btn').addEventListener('click', function () {
                if (this.classList.contains('close')) {
                    document.getElementById('nav1').classList.add('hidden');
                    this.classList.remove('close');
                } else {
                    document.getElementById('nav1').classList.remove('hidden');
                    this.classList.add('close');
                }
            });
        }
        </script>

        @livewireScripts
    </body>
</html>
