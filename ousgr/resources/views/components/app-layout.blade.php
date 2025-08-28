<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- si tu utilises Vite --}}
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        {{ $slot }}
    </div>
</body>
</html>
