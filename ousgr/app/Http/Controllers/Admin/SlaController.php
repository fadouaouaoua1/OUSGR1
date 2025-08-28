<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sla;
use Illuminate\Http\Request;

class SlaController extends Controller
{
    public function index()
    {
        $slas = Sla::all();
        return view('admin.slas.index', compact('slas'));
    }

    public function create()
    {
        return view('admin.slas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'delai_heures' => 'required|integer|min:1',
        ]);

        Sla::create($request->only('titre', 'delai_heures'));

        return redirect()->route('admin.slas.index')->with('success', 'SLA ajouté avec succès.');
    }

    public function edit(Sla $sla)
    {
        return view('admin.slas.edit', compact('sla'));
    }

    public function update(Request $request, Sla $sla)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'delai_heures' => 'required|integer|min:1',
        ]);

        $sla->update($request->only('titre', 'delai_heures'));

        return redirect()->route('admin.slas.index')->with('success', 'SLA mis à jour.');
    }

    public function destroy(Sla $sla)
    {
        $sla->delete();

        return redirect()->route('admin.slas.index')->with('success', 'SLA supprimé.');
    }
}
