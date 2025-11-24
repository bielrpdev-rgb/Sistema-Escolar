<!DOCTYPE html>
<html>
<head>
    <title>Gestão Escolar</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <!-- Exemplo de menu de navegação para colocar no layout.blade.php -->
<nav>
    <a href="{{ url('/alunos') }}">Alunos</a> |
    <a href="{{ url('/turmas') }}">Turmas</a> |
    <a href="{{ url('/matriculas') }}">Matrículas</a>
</nav>

        @yield('content')
    </div>
</body>
</html>
