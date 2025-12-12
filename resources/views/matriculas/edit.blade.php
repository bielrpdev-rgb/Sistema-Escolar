@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0 pb-0">
                    <h4 class="mb-2">Editar Matrícula</h4>
                    <p class="text-muted mb-0">
                        {{ $matricula->aluno->nome ?? 'Aluno' }} 
                        • {{ $matricula->turma->nome ?? 'Turma' ?? 'Turma' }} 
                        • {{ $matricula->data_hora->format('d/m/Y H:i') }}
                    </p>
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

                    <form action="{{ route('matriculas.update', $matricula) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Aluno</strong> (fixo)</label>
                                    <input type="text" 
                                           class="form-control bg-light" 
                                           value="{{ $matricula->aluno->nome ?? '-' }}" 
                                           readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        @php $statusAtual = old('status', $matricula->status); @endphp
                                        <option value="ativa" {{ $statusAtual == 'ativa' ? 'selected' : '' }}>Ativa</option>
                                        <option value="pendente" {{ $statusAtual == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                        <option value="cancelada" {{ $statusAtual == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="turma_id" class="form-label">Turma</label>
                                    <select class="form-select @error('turma_id') is-invalid @enderror" 
                                            id="turma_id" name="turma_id" required>
                                        @foreach($turmas as $turma)
                                            <option value="{{ $turma->id }}" 
                                                    {{ old('turma_id', $matricula->turma_id) == $turma->id ? 'selected' : '' }}>
                                                {{ $turma->nome }} ({{ $turma->ano }} - {{ $turma->turno }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('turma_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="data_hora" class="form-label">Data e Hora</label>
                                    <input type="datetime-local"
                                           class="form-control @error('data_hora') is-invalid @enderror"
                                           id="data_hora" 
                                           name="data_hora"
                                           value="{{ old('data_hora', $matricula->data_hora->format('Y-m-d\TH:i')) }}"
                                           required>
                                    @error('data_hora')
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
                                Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
