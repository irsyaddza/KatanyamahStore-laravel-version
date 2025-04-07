<!doctype html>
<html class="h-full bg-yellow-400">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Katanyamah Store | Dashboard</title>
</head>

<!-- Layout utama - resources/views/layouts/app.blade.php atau file layout Anda -->
<body class="min-h-screen bg-yellow-400">
    <!-- Navbar tetap di atas -->
    <x-navbar></x-navbar>
    
    <!-- Struktur konten utama dengan sidebar -->
    <div class="flex min-h-[calc(100vh-64px)]">
        
        <!-- Konten utama -->
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
    
    <!-- Footer (jika ada) -->
    <x-footer></x-footer>
</body>
</html>