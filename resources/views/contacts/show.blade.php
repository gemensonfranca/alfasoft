<h1>Detalhes do Contato</h1>

<p><strong>Nome:</strong> {{ $contact->name }}</p>
<p><strong>Telefone:</strong> {{ $contact->contact }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>

<a href="{{ route('contacts.edit', $contact) }}">Editar</a>

<form action="{{ route('contacts.destroy', $contact) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>