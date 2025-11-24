<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    // Listar todos os alunos
    public function index()
{
    $alunos = Aluno::all();
    return view('alunos.index', compact('alunos'));
}


    // Mostrar formulário de criação de aluno
    public function create()
    {
        return view('alunos.create');
    }

    // Criar um novo aluno
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string',
        'email' => 'required|email',
        'nascimento' => 'required|date',
    ]);

    Aluno::create($request->all());
    return redirect()->route('alunos.index')
                     ->with('success', 'Aluno cadastrado com sucesso!');
}


    // Visualizar um aluno específico
    public function show($id)
    {
        return Aluno::findOrFail($id);
    }

    // Atualizar um aluno
    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());
        return $aluno;
    }

    // Excluir um aluno
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        return response()->json(['message' => 'Aluno excluído com sucesso']);
    }
}
