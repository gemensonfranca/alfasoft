<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Contato</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .detail {
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            margin-top: 5px;
            color: #222;
        }

        .actions {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn-secondary {
            background: #2196F3;
            color: white;
        }

        .btn-warning {
            background: #ff9800;
            color: white;
        }

        .btn-danger {
            background: #f44336;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .back {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #2196F3;
            font-size: 14px;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('contacts.index') }}" class="back">← Voltar</a>

    <h1>Detalhes do Contato</h1>

    <div class="detail">
        <div class="label">Nome:</div>
        <div class="value">{{ $contact->name }}</div>
    </div>

    <div class="detail">
        <div class="label">Telefone:</div>
        <div class="value">{{ $contact->contact }}</div>
    </div>

    <div class="detail">
        <div class="label">Email:</div>
        <div class="value">{{ $contact->email }}</div>
    </div>

    <div class="actions">
        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">
            Editar
        </a>

        <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                Excluir
            </button>
        </form>
    </div>

</div>

</body>
</html>