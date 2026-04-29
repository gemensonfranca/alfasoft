<h1>Editar Contato</h1>

<form action="{{ route('contacts.update', $contact) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $contact->name }}">
    @error('name') <p>{{ $message }}</p> @enderror

    <input type="text" name="contact" value="{{ $contact->contact }}">
    @error('contact') <p>{{ $message }}</p> @enderror

    <input type="email" name="email" value="{{ $contact->email }}">
    @error('email') <p>{{ $message }}</p> @enderror

    <button type="submit">Atualizar</button>
</form>