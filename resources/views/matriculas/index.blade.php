@extends('layout')

@section('content')
<h1>Lista de Matrículas</h1>
<a href="{{ route('matriculas.create') }}">Cadastrar Nova Matrícula</a>
<table>
    <tr>
        <th>ID</th>
        <th>Aluno</th>
        <th>Turma</th>
        <th>Data da Matrícula</th>
    </tr>
    @foreach ($matriculas as $matricula)
    <tr>
        <td>{{ $matricula->id }}</td>
        <td>{{ $matricula->aluno_id }}</td>
        <td>{{ $matricula->turma_id }}</td>
        <td>{{ $matricula->data_matricula }}</td>
    </tr>
    @endforeach
</table>
@endsection
