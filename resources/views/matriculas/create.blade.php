@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0 pb-0">
                    <h4 class="mb-2">Nova Matrícula</h4>
                    <p class="text-muted mb-0">Preencha os dados da matrícula</p>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('matriculas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select
                                id="aluno_id"
                                name="aluno_id"
                                class="form-select @error('aluno_id') is-invalid @enderror"
                                required
                            >
                                <option value="">Selecione um aluno...</option>
                                @foreach($alunos as $aluno)
                                    <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                                        {{ $aluno->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('aluno_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="turma_id" class="form-label">Turma</label>
                            <select
                                id="turma_id"
                                name="turma_id"
                                class="form-select @error('turma_id') is-invalid @enderror"
                                required
                            >
                                <option value="">Selecione uma turma...</option>
                                @foreach($turmas as $turma)
                                    <option value="{{ $turma->id }}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>
                                        {{ $turma->nome }} ({{ $turma->ano }} - {{ $turma->turno }})
                                    </option>
                                @endforeach
                            </select>
                            @error('turma_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="data_hora" class="form-label">Data e Hora</label>
                                    <input
                                        type="datetime-local"
                                        id="data_hora"
                                        name="data_hora"
                                        value="{{ old('data_hora') }}"
                                        class="form-control @error('data_hora') is-invalid @enderror"
                                        required
                                    >
                                    @error('data_hora')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select
                                        id="status"
                                        name="status"
                                        class="form-select @error('status') is-invalid @enderror"
                                        required
                                    >
                                        @php $statusAtual = old('status', 'Ativa'); @endphp
                                        <option value="Ativa" {{ $statusAtual == 'Ativa' ? 'selected' : '' }}>Ativa</option>
                                        <option value="Pendente" {{ $statusAtual == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                        <option value="Cancelada" {{ $statusAtual == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('matriculas.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Criar Matrícula
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
