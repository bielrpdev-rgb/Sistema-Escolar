@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Matrículas</h2>
            <p class="text-muted mb-0">Controle de matrículas por aluno e turma</p>
        </div>
        <a href="{{ route('matriculas.create') }}" class="btn btn-primary">
            Nova Matrícula
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
                            <th>Aluno</th>
                            <th>Turma</th>
                            <th>Data/Hora</th>
                            <th>Status</th>
                            <th style="text-align:right;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($matriculas as $matricula)
                            <tr>
                                <td>{{ $matricula->id }}</td>
                                <td>{{ $matricula->aluno->nome ?? '-' }}</td>
                                <td>{{ $matricula->turma->nome ?? '-' }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($matricula->data_hora)->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($matricula->status === 'Ativa') bg-success 
                                        @elseif($matricula->status === 'Cancelada') bg-danger 
                                        @else bg-secondary @endif">
                                        {{ $matricula->status }}
                                    </span>
                                </td>
                                <td style="text-align:right;">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('matriculas.edit', $matricula) }}" class="btn btn-outline-primary">
                                            Editar
                                        </a>
                                        <form action="{{ route('matriculas.destroy', $matricula) }}"
                                              method="POST"
                                              class="d-inline"
                                              style="margin-left:5px;"
                                              onsubmit="return confirm('Confirma a exclusão desta matrícula?')">
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
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted mb-3">Nenhuma matrícula cadastrada.</p>
                                    <a href="{{ route('matriculas.create') }}" class="btn btn-primary">
                                        Cadastrar primeira matrícula
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
