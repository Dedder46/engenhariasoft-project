<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        // Obter as oportunidades da empresa autenticada
        $oportunidades = Auth::user()->opportunities;

        // Obter todas as candidaturas relacionadas às oportunidades da empresa
        $candidaturas = Application::whereIn('oportunidade_id', $oportunidades->pluck('id'))
            ->with('aluno', 'oportunidade')
            ->get();

        return view('empresa.candidaturas', compact('candidaturas'));
    }
    public function apply($id)
{
    Application::create([
        'aluno_id' => auth()->id(),
        'oportunidade_id' => $id,
    ]);

    return back()->with('success', 'Candidatura enviada com sucesso!');
}
}
