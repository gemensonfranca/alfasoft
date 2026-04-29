<h1>Novo Contato</h1>

<form action="{{ route('contacts.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nome">
    @error('name') <p>{{ $message }}</p> @enderror

    <input type="text" name="contact" placeholder="Telefone">
    @error('contact') <p>{{ $message }}</p> @enderror

    <input type="email" name="email" placeholder="Email">
    @error('email') <p>{{ $message }}</p> @enderror

    <button type="submit">Salvar</button>
</form>