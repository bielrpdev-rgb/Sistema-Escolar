@extends('layout')

@section('content')
<h1>Cadastrar Novo Aluno</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('alunos.store') }}" method="POST">
    @csrf
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
    </div>
    <div>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" value="{{ old('nascimento') }}">
    </div>
    <button type="submit">Cadastrar</button>
</form>
@endsection
