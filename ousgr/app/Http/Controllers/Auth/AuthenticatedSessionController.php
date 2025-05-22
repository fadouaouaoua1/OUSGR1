<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = auth()->user();
   $role = auth()->user()->role->nom;

switch ($role) {
    case 'admin_dsi':
        return redirect()->route('admin.dsi.dashboard');
    case 'admin_fonctionnel':
        return redirect()->route('admin.fonctionnel.dashboard');
    case 'employe':
        return redirect()->route('employe.dashboard');
    case 'prestataire':
        return redirect()->route('prestataire.dashboard');
    default:
        abort(403, 'Rôle inconnu.');
}

}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
