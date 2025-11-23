<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;
use App\Models\Aluno;

Route::resource('alunos', AlunoController::class);
Route::resource('turmas', TurmaController::class);
Route::resource('matriculas', MatriculaController::class);

Route::get('/', function () {
    $alunos = Aluno::all();
    return view('welcome', compact('alunos'));
});
