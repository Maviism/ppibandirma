<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PPI Bandirma</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Tailwind -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="logo.png" type="image/x-icon">
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        @livewireStyles
    </head>
    <body class="antialiased">

        @livewire('components.navbar')
        @livewire('index')
        
        <footer>
                <div class="pt-2 text-center text-gray-500">© 2020 PPI Bandirma. All rights
                    reserved.</div>
        </footer>

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
