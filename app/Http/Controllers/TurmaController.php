<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:2100',
        ]);

        DB::transaction(function () use ($request) {
            Turma::create([
                'nome' => $request->nome,
                'ano' => $request->ano,
                'turno' => 'Manhã'
            ]);
        });

        return redirect()->route('turmas.index')
                         ->with('success', 'Turma criada com sucesso!');
    }

    public function show(Turma $turma)
    {
        $alunos = $turma->alunos()->with('aluno')->get();
        return view('turmas.show', compact('turma', 'alunos'));
    }

    public function edit(Turma $turma)
    {
        return view('turmas.edit', compact('turma'));
    }

    public function update(Request $request, Turma $turma)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:2100',
        ]);

        DB::transaction(function () use ($request, $turma) {
            $turma->update([
                'nome' => $request->nome,
                'ano' => $request->ano,
                'turno' => 'Manhã'
            ]);
        });

        return redirect()->route('turmas.index')
                         ->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy(Turma $turma)
    {
        DB::transaction(function () use ($turma) {
            Matricula::where('turma_id', $turma->id)->delete();
            $turma->delete();
        });

        return redirect()->route('turmas.index')
                         ->with('success', 'Turma excluída com sucesso!');
    }

    // ✅ ENDPOINT EXTRA: Alunos de uma turma (Query Object)
    public function alunos(Turma $turma)
    {
        $alunos = $turma->alunos()->with('aluno')->get();
        return response()->json($alunos);
    }
}
