@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Liste des SLA</h1>
        <a href="{{ route('admin.slas.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Ajouter un SLA
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg border">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Délai (heures)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($slas as $sla)
                    <tr>
                        <td class="px-6 py-4 text-sm">{{ $sla->id }}</td>
                        <td class="px-6 py-4 text-sm">{{ $sla->titre }}</td>
                        <td class="px-6 py-4 text-sm">{{ $sla->delai_heures }} h</td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.slas.edit', $sla->id) }}"
                               class="text-indigo-600 hover:text-indigo-900 mr-3">📝 Modifier</a>

                            <form action="{{ route('admin.slas.destroy', $sla->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Confirmer la suppression ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-sm text-gray-500">Aucun SLA trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
