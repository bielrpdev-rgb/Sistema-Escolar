@extends('layout')

@section('content')
<h1>Cadastrar Nova Turma</h1>
<form action="{{ route('turmas.store') }}" method="POST">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao"><br>
    <button type="submit">Cadastrar</button>
</form>
@endsection
