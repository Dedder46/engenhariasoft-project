<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'titulo',
        'descricao',
        'competencias',
        'tipo_trabalho',
        'modo_trabalho',
        'localizacao',
        'periodo_trabalho',
        'tipo_contrato',
        'urgencia',
    ];
    public function candidaturas()
{
    return $this->hasMany(Application::class, 'oportunidade_id');
}
}

