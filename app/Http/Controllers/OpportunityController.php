<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Opportunity;

class OpportunityController extends Controller
{
    // Exibir o formulário para criar uma oportunidade
    public function create()
    {
        return view('oportunidades.create');
    }

    public function index(Request $request)
    {
        // Capturar filtros da requisição
        $filters = $request->only(['urgencia', 'localizacao', 'modo_trabalho']);

        // Buscar oportunidades aplicando os filtros
        $oportunidades = Opportunity::query()
            ->when($filters['urgencia'] ?? null, function ($query, $urgencia) {
                $query->where('urgencia', $urgencia);
            })
            ->when($filters['localizacao'] ?? null, function ($query, $localizacao) {
                $query->where('localizacao', 'LIKE', '%' . $localizacao . '%');
            })
            ->when($filters['modo_trabalho'] ?? null, function ($query, $modo_trabalho) {
                $query->where('modo_trabalho', $modo_trabalho);
            })
            ->get();

        // Retornar a view com as oportunidades e os filtros aplicados
        return view('oportunidades.index', compact('oportunidades', 'filters'));
    }

    // Processar o registro da oportunidade
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'competencias' => 'nullable|string',
            'tipo_trabalho' => 'required|in:Part-time,Full-time',
            'modo_trabalho' => 'required|in:Presencial,Híbrido,Remoto',
            'localizacao' => 'required|string|max:255',
            'periodo_trabalho' => 'required|string|max:255',
            'tipo_contrato' => 'required|string|max:255',
            'urgencia' => 'required|in:Baixa,Média,Alta',
        ]);

        Opportunity::create([
            'empresa_id' => auth()->user()->id,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'competencias' => $request->competencias,
            'tipo_trabalho' => $request->tipo_trabalho,
            'modo_trabalho' => $request->modo_trabalho,
            'localizacao' => $request->localizacao,
            'periodo_trabalho' => $request->periodo_trabalho,
            'tipo_contrato' => $request->tipo_contrato,
            'urgencia' => $request->urgencia,
        ]);

        return redirect()->route('oportunidades.create')->with('success', 'Oportunidade criada com sucesso!');
    }
}
