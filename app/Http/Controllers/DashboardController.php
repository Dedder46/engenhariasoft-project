<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard da empresa
    public function empresaDashboard()
    {
        return view('dashboard.empresa');
    }

    // Dashboard do aluno
    public function alunoDashboard()
    {
        return view('dashboard.aluno');
    }
}
