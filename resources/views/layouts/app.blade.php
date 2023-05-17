    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Default Title')</title>
        @livewireStyles
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        @vite('resources/js/app.js')
    </head>
    <body class="dark:bg-gray-800 text-white">
        <div class="container  mx-auto p-4">
            @yield('content')
        </div>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.js" defer></script>
    </body>
    </html>
