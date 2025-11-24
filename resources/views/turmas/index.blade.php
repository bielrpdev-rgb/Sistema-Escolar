@extends('layout')

@section('content')
<h1>Lista de Turmas</h1>
<a href="{{ route('turmas.create') }}">Cadastrar Nova Turma</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
    </tr>
    @foreach ($turmas as $turma)
    <tr>
        <td>{{ $turma->id }}</td>
        <td>{{ $turma->nome }}</td>
        <td>{{ $turma->descricao }}</td>
    </tr>
    @endforeach
</table>
@endsection
