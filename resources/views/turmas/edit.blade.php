@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0 pb-0">
                    <h4 class="mb-2">Editar Turma</h4>
                    <p class="text-muted mb-0">{{ $turma->nome }} • {{ $turma->ano }}</p>
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

                    <form action="{{ route('turmas.update', $turma) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Turma</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" 
                                   id="nome" name="nome" value="{{ old('nome', $turma->nome) }}" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ano" class="form-label">Ano</label>
                                    <input type="number" class="form-control @error('ano') is-invalid @enderror" 
                                           id="ano" name="ano" value="{{ old('ano', $turma->ano) }}" min="1900" max="2100" required>
                                    @error('ano')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="turno" class="form-label">Turno</label>
                                    <select class="form-select @error('turno') is-invalid @enderror" id="turno" name="turno" required>
                                        @php $turnoAtual = old('turno', $turma->turno); @endphp
                                        <option value="Manhã" {{ $turnoAtual == 'Manhã' ? 'selected' : '' }}>Manhã</option>
                                        <option value="Tarde" {{ $turnoAtual == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                                        <option value="Noite" {{ $turnoAtual == 'Noite' ? 'selected' : '' }}>Noite</option>
                                    </select>
                                    @error('turno')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('turmas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
