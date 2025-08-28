<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Liste des utilisateurs
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    // Affichage du formulaire de création
    public function create()
    {
        $roles = Role::all(); // Assure-toi que la table "roles" a bien une colonne "nom"
        return view('admin.users.create', compact('roles'));
    }

    // Enregistrement du nouvel utilisateur
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required|array',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => $validated['roles'][0], // Premier rôle sélectionné
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validation
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'telephone' => 'nullable|string|max:20',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|confirmed|min:6',
        'roles' => 'required|array|min:1',
    ]);

    // Mise à jour des données
    $user->name = $validated['name'];
    $user->telephone = $validated['telephone'] ?? null;
    $user->email = $validated['email'];

    // Mise à jour du mot de passe uniquement s’il a été rempli
    if ($request->filled('password')) {
        $user->password = bcrypt($validated['password']);
    }

    // Mise à jour du rôle
    $user->role_id = $validated['roles'][0]; // un seul rôle sélectionné

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'Utilisateur modifié avec succès.');
}
public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();

    return view('admin.users.edit', compact('user', 'roles'));
}
public function destroy($id)
{
    $user = User::findOrFail($id);
    
    // Optionnel : empêcher la suppression de certains comptes critiques
    // if ($user->role->nom === 'admin_dsi') {
    //     return redirect()->back()->with('error', 'Impossible de supprimer cet utilisateur.');
    // }

    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
}

}
