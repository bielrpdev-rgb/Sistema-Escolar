<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 8px;
            padding: 8px;
            background-color: #f2f2f2;
            border-radius: 4px;
            width: 300px;
        }
    </style>
</head>
<body>
    <h1>Alunos</h1>

    @if (count($alunos) > 0)
        <ul>
            @foreach ($alunos as $aluno)
                <li>{{ $aluno->nome }}</li>
            @endforeach
        </ul>
    @else
        <p>Não há alunos cadastrados.</p>
    @endif

</body>
</html>
