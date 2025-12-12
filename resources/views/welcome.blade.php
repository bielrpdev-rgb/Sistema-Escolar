@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="mb-3">Bem-vindo ao Sistema de Gestão Escolar</h1>
        <p class="lead">
            Gerencie alunos, turmas e matrículas de forma simples e organizada.
        </p>
        <a href="{{ route('alunos.index') }}" class="btn btn-primary btn-lg mt-3">
            Entrar no sistema
        </a>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <h4>Alunos</h4>
            <p>Cadastre, edite e gerencie os dados dos alunos.</p>
            <a href="{{ route('alunos.index') }}" class="btn btn-outline-primary btn-sm">
                Ir para Alunos
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <h4>Turmas</h4>
            <p>Organize turmas por ano, turno e visualize seus alunos.</p>
            <a href="{{ route('turmas.index') }}" class="btn btn-outline-primary btn-sm">
                Ir para Turmas
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <h4>Matrículas</h4>
            <p>Controle as matrículas com aluno, turma, data e status.</p>
            <a href="{{ route('matriculas.index') }}" class="btn btn-outline-primary btn-sm">
                Ir para Matrículas
            </a>
        </div>
    </div>
</div>
@endsection
