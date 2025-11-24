@extends('layout')

@section('content')
<h1>Cadastrar Nova Matrícula</h1>
<form action="{{ route('matriculas.store') }}" method="POST">
    @csrf
    <label for="aluno_id">ID do Aluno:</label>
    <input type="number" id="aluno_id" name="aluno_id" required><br>
    <label for="turma_id">ID da Turma:</label>
    <input type="number" id="turma_id" name="turma_id" required><br>
    <label for="data_matricula">Data da Matrícula:</label>
    <input type="date" id="data_matricula" name="data_matricula" required><br>
    <button type="submit">Cadastrar</button>
</form
