<h1>Contatos</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('contacts.create') }}">Novo Contato</a>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>
            <td>
                <a href="{{ route('contacts.show', $contact) }}">Ver</a>
                <a href="{{ route('contacts.edit', $contact) }}">Editar</a>

                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>