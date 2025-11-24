<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
{
    $matriculas = Matricula::all();
    return view('matriculas.index', compact('matriculas'));
}

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|integer|exists:alunos,id',
            'turma_id' => 'required|integer|exists:turmas,id',
            'data_matricula' => 'required|date',
        ]);

        return Matricula::create($request->all());
    }
    public function create()
{
    return view('matriculas.create');
}


    public function show($id)
    {
        return Matricula::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->update($request->all());
        return $matricula;
    }

    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();
        return response()->json(['message' => 'Matrícula excluída com sucesso']);
    }
}

    