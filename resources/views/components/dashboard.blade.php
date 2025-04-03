<!doctype html>
<html class="h-full bg-yellow-400">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Katanyamah Store | Dashboard</title>
</head>

<body class="h-full">
    <div class="flex flex-col min-h-screen">
        <x-navbar></x-navbar>
        
        <div class="flex flex-1">
            <x-sidebar></x-sidebar>
            
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
        
        <x-footer></x-footer>
    </div>
</body>
</html>