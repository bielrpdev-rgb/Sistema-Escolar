<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'aluno_id',
        'turma_id', 
        'data_hora',
        'status'
    ];

    protected $casts = [
        'data_hora' => 'datetime'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
