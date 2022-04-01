<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Event | PPI Bandirma</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">

        <!-- Tailwind -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        @livewireStyles
    </head>
    <body class="antialiased">

        @livewire('components.navbar')
            
        <div class="relative flex min-h-screen py-4 sm:pt-0">
        @livewire('event.index')          
        </div>
        
        

        <script>
        if (document.getElementById('nav-mobile-btn')) {
            document.getElementById('nav-mobile-btn').addEventListener('click', function () {
                if (this.classList.contains('close')) {
                    document.getElementById('nav').classList.add('hidden');
                    this.classList.remove('close');
                } else {
                    document.getElementById('nav').classList.remove('hidden');
                    this.classList.add('close');
                }
            });
        }
        </script>
        @livewireScripts
    </body>
</html>
