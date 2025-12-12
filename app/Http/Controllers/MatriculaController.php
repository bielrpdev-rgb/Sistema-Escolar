<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    // Lista todas as matrículas
    public function index()
    {
        $matriculas = Matricula::with(['aluno', 'turma'])->get();
        return view('matriculas.index', compact('matriculas'));
    }

    // Formulário de criação
    public function create()
    {
        $alunos = Aluno::all();
        $turmas = Turma::all();
        
        return view('matriculas.create', compact('alunos', 'turmas'));
    }

    // Processo de matrícula (Transaction Script)
   public function store(Request $request)
{
    $request->validate([
        'aluno_id' => 'required|exists:alunos,id',
        'turma_id' => 'required|exists:turmas,id',
        'data_hora' => 'required|date',
        'status' => 'required|string',
    ]);

    // FORÇA valores minúsculos para combinar com CHECK constraint do SQLite
    $statusMap = [
        'Ativa' => 'ativa',
        'Pendente' => 'pendente', 
        'Cancelada' => 'cancelada'
    ];

    DB::table('matriculas')->insert([
        'aluno_id' => $request->aluno_id,
        'turma_id' => $request->turma_id,
        'data_hora' => $request->data_hora,
        'status' => $statusMap[$request->status] ?? strtolower($request->status),
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->route('matriculas.index')
                     ->with('success', 'Matrícula criada com sucesso!');
}

    // Formulário de edição
    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);
        $alunos = Aluno::all();
        $turmas = Turma::all();

        return view('matriculas.edit', compact('matricula', 'alunos', 'turmas'));
    }

    // Atualiza matrícula
   public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string',
        'turma_id' => 'required|exists:turmas,id',
        'data_hora' => 'required|date',
    ]);

    DB::transaction(function () use ($request, $id) {
        DB::table('matriculas')
            ->where('id', $id)
            ->update([
                'status' => $request->status,
                'turma_id' => $request->turma_id,
                'data_hora' => $request->data_hora,
                'updated_at' => now()
            ]);
    });

    return redirect()->route('matriculas.index')
                     ->with('success', 'Matrícula atualizada com sucesso!');
}

    // Exclui matrícula
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            Matricula::findOrFail($id)->delete();
        });

        return redirect()->route('matriculas.index')
                         ->with('success', 'Matrícula excluída com sucesso!');
    }
}
