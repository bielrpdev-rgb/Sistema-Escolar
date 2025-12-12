<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome', 'email', 'nascimento'];

    protected $casts = [
        'nascimento' => 'date'
    ];

    // ✅ Um aluno tem várias matrículas
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    // ✅ Turmas através de matrículas
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'matriculas', 'aluno_id', 'turma_id');
    }
}
