<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['nome', 'ano', 'turno'];

    protected $casts = [
        'ano' => 'integer',
    ];

    // ✅ Uma turma tem várias matrículas
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    // ✅ Alunos através de matrículas
    public function alunos()
    {
        return $this->hasManyThrough(Aluno::class, Matricula::class);
    }
}
