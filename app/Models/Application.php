<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['aluno_id', 'oportunidade_id'];

    // Relacionamento com o modelo User (Aluno)
    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }

    // Relacionamento com o modelo Opportunity
    public function oportunidade()
    {
        return $this->belongsTo(Opportunity::class, 'oportunidade_id');
    }
}
