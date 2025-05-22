@extends('layouts.guest')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md p-8 bg-white rounded shadow">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Connexion</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" placeholder="Email" required class="w-full mb-4 px-3 py-2 border rounded">
                <input type="password" name="password" placeholder="Mot de passe" required class="w-full mb-4 px-3 py-2 border rounded">

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Se connecter</button>
            </form>
        </div>
    </div>
@endsection
