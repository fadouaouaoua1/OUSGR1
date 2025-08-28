<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'OUSGR') }}</title>

    <!-- Fonts & Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100">

    <div x-data="{ sidebarOpen: true, sidebarFolded: false }" class="flex h-screen">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Contenu principal --}}
        <div class="flex-1 flex flex-col">
            @include('layouts.header')

            <main class="p-4 overflow-auto">
                {{-- Notifications --}}
                @if(session('success'))
                    <div class="text-green-600">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="text-red-600">{{ session('error') }}</div>
                @endif

                @if($errors->any())
                    <div class="text-red-600">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Contenu dynamique --}}
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
