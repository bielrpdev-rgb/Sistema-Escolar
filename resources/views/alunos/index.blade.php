@extends('layout')

@section('content')
<h1>Lista de Alunos</h1>
<a href="{{ route('alunos.create') }}">Cadastrar Novo Aluno</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Nascimento</th>
    </tr>
    @foreach ($alunos as $aluno)
    <tr>
        <td>{{ $aluno->id }}</td>
        <td>{{ $aluno->nome }}</td>
        <td>{{ $aluno->email }}</td>
        <td>{{ $aluno->nascimento }}</td>
    </tr>
    @endforeach
</table>
@endsection
