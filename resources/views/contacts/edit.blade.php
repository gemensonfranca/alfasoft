<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
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

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .error {
            color: #d8000c;
            font-size: 13px;
            margin-top: 5px;
        }

        .actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #4CAF50;
            color: white;
        }

        .btn-secondary {
            background: #ccc;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('contacts.index') }}" class="back">← Voltar</a>

    <h1>Editar Contato</h1>

    <form action="{{ route('contacts.update', $contact) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" value="{{ old('name', $contact->name) }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="contact" value="{{ old('contact', $contact->contact) }}">
            @error('contact')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $contact->email) }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="actions">
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Atualizar
            </button>
        </div>

    </form>

</div>

</body>
</html>