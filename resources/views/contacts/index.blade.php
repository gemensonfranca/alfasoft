<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contatos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
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

        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #4CAF50;
            color: white;
        }

        .btn-primary:hover {
            background: #45a049;
        }

        .btn-secondary {
            background: #2196F3;
            color: white;
        }

        .btn-danger {
            background: #f44336;
            color: white;
        }

        .btn-warning {
            background: #ff9800;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .message {
            background: #e6ffed;
            color: #2e7d32;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f0f0f0;
            text-align: left;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        tr:hover {
            background: #fafafa;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .empty {
            text-align: center;
            color: #888;
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Lista de Contatos</h1>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <div class="top-bar">
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">+ Novo Contato</a>

        @if(auth()->check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-secondary">Sair</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th style="width: 180px;">Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('contacts.show', $contact) }}" class="btn btn-secondary">Ver</a>

                            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Tem certeza?')">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">
                        Nenhum contato cadastrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>