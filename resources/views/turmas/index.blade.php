@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Turmas</h2>
            <p class="text-muted mb-0">Gerencie todas as turmas cadastradas</p>
        </div>
        <a href="{{ route('turmas.create') }}" class="btn btn-primary">
            Nova Turma
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
                            <th>Nome da Turma</th>
                            <th>Ano</th>
                            <th>Turno</th>
                            <th style="text-align: right;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($turmas as $turma)
                            <tr>
                                <td>{{ $turma->id }}</td>
                                <td><strong>{{ $turma->nome }}</strong></td>
                                <td>{{ $turma->ano }}</td>
                                <td><span class="badge bg-primary">{{ $turma->turno }}</span></td>
                                <td style="text-align: right;">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('turmas.edit', $turma) }}" class="btn btn-outline-primary">
                                            Editar
                                        </a>
                                        <form action="{{ route('turmas.destroy', $turma) }}" method="POST" class="d-inline" style="margin-left: 5px;" onsubmit="return confirm('Confirma a exclusão?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <p class="text-muted mb-3">Nenhuma turma cadastrada</p>
                                    <a href="{{ route('turmas.create') }}" class="btn btn-primary">Cadastrar primeira turma</a>
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
