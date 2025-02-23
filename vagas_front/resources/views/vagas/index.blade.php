<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas de Emprego</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        h1, h2 {
            color: #333;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            margin-top: 20px;
        }
        p.success {
            color: green;
        }
        p.error {
            color: red;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input, textarea, button {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #5cb85c;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .logout-form {
            display: inline;
        }
        .logout-button {
            background-color: #d9534f;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Vagas de Emprego</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        @if(Auth::check())
            <p>Bem-vindo, <strong>{{ Auth::user()->name }}</strong>!</p>
        @else
            <p>Você não está logado.</p>
        @endif

        <h2>Cadastrar Nova Vaga</h2>
        <form action="/vagas" method="POST">
            @csrf
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>

            <label for="empresa">Empresa:</label>
            <input type="text" name="empresa" required>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required></textarea>

            <label for="salario">Salário:</label>
            <input type="number" name="salario" step="0.01" required>

            <button type="submit">Cadastrar Vaga</button>
        </form>

        <table>
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
    </div>
</body>
</html>