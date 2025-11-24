<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Sistema Escolar</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Gestão Escolar</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ url('/alunos') }}">Alunos</a>
                <a class="nav-link" href="{{ url('/turmas') }}">Turmas</a>
                <a class="nav-link" href="{{ url('/matriculas') }}">Matrículas</a>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
