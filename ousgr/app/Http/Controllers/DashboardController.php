<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function employe()
    {
        return view('dashboards.employe');
    }

    public function prestataire()
    {
        return view('dashboards.prestataire');
    }

    public function adminFonctionnel()
    {
        return view('dashboards.admin_fonctionnel');
    }

    public function adminDsi()
    {
        return view('dashboards.admin_dsi');
    }
}

