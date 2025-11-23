<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        return Turma::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
        ]);

        return Turma::create($request->all());
    }

    public function show($id)
    {
        return Turma::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);
        $turma->update($request->all());
        return $turma;
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();
        return response()->json(['message' => 'Turma excluída com sucesso']);
    }
}
