<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas de Emprego</title>
</head>
<body>
    <h1>Lista de Vagas de Emprego</h1>

    <!-- Exibir mensagens de sucesso ou erro -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <!-- Formulário para adicionar nova vaga -->
    <h2>Cadastrar Nova Vaga</h2>
    <form action="/vagas" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        <br>
        <label for="empresa">Empresa:</label>
        <input type="text" name="empresa" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea>
        <br>
        <label for="salario">Salário:</label>
        <input type="number" name="salario" step="0.01" required>
        <br>
        <button type="submit">Cadastrar Vaga</button>
    </form>

    <!-- Tabela de vagas -->
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Descrição</th>
            <th>Salário</th>
            <th>Data de Publicação</th>
        </tr>
        @foreach ($vagas as $vaga)
        <tr>
            <td>{{ $vaga['titulo'] }}</td>
            <td>{{ $vaga['empresa'] }}</td>
            <td>{{ $vaga['descricao'] }}</td>
            <td>R$ {{ number_format($vaga['salario'], 2, ',', '.') }}</td>
            <td>{{ date('d/m/Y', strtotime($vaga['data_publicacao'])) }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
