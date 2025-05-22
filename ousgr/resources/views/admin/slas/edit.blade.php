@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="bg-white shadow-md rounded px-6 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Modifier le SLA</h1>

        <form method="POST" action="{{ route('admin.slas.update', $sla->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                <input id="titre" name="titre" type="text" value="{{ old('titre', $sla->titre) }}"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100">
            </div>

            <div class="mb-6">
                <label for="delai_heures" class="block text-sm font-medium text-gray-700 mb-1">Délai (en heures)</label>
                <input id="delai_heures" name="delai_heures" type="number" min="1"
                       value="{{ old('delai_heures', $sla->delai_heures) }}"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100">
            </div>

            <div class="text-right">
                <a href="{{ route('admin.slas.index') }}" class="inline-block mr-4 text-sm text-gray-500 hover:underline">← Annuler</a>
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
