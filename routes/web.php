<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;

Route::resource('alunos', AlunoController::class);
Route::resource('turmas', TurmaController::class);
Route::resource('matriculas', MatriculaController::class);





