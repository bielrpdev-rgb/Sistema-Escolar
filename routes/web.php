<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;

Route::resource('alunos', AlunoController::class);
Route::resource('turmas', TurmaController::class);
Route::resource('matriculas', MatriculaController::class);

// ✅ ENDPOINTS EXTRAS
Route::get('turmas/{turma}/alunos', [TurmaController::class, 'alunos']);
Route::get('alunos/{aluno}/turmas', [AlunoController::class, 'turmas']);

Route::get('/', function () {
    return view('welcome');
});
