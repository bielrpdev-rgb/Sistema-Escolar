<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:alunos,email',
            'nascimento' => 'required|date',
        ]);

        Aluno::create($request->only(['nome', 'email', 'nascimento']));

        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:alunos,email,' . $id,
            'nascimento' => 'required|date',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->only(['nome', 'email', 'nascimento']));

        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno excluído com sucesso!');
    }

    // ✅ ENDPOINT EXTRA: Turmas de um aluno (Query Object)
    public function turmas(Aluno $aluno)
    {
        $turmas = $aluno->matriculas()->with('turma')->get();
        return response()->json($turmas);
    }
}
