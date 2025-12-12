@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Alunos</h2>
            <p class="text-muted mb-0">Gerencie todos os alunos cadastrados</p>
        </div>
        <a href="{{ route('alunos.create') }}" class="btn btn-primary">
            Novo Aluno
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data de Nascimento</th>
                            <th style="text-align:right;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alunos as $aluno)
                            <tr>
                                <td>{{ $aluno->id }}</td>
                                <td><strong>{{ $aluno->nome }}</strong></td>
                                <td>{{ $aluno->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($aluno->nascimento)->format('d/m/Y') }}</td>
                                <td style="text-align:right;">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('alunos.edit', $aluno) }}" class="btn btn-outline-primary">
                                            Editar
                                        </a>
                                        <form action="{{ route('alunos.destroy', $aluno) }}"
                                              method="POST"
                                              class="d-inline"
                                              style="margin-left:5px;"
                                              onsubmit="return confirm('Confirma a exclusão deste aluno?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <p class="text-muted mb-3">Nenhum aluno cadastrado.</p>
                                    <a href="{{ route('alunos.create') }}" class="btn btn-primary">
                                        Cadastrar primeiro aluno
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
