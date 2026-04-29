<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name'    => 'required|min:5',
                'contact' => 'required|digits:9|unique:contacts,contact',
                'email'   => 'required|email|unique:contacts,email',
            ],
            [
                'name.required'    => 'O nome é obrigatório.',
                'name.min'         => 'O nome deve ter no mínimo 5 caracteres.',

                'contact.required' => 'O telefone é obrigatório.',
                'contact.digits'   => 'O telefone deve conter exatamente 9 dígitos.',
                'contact.unique'   => 'Este telefone já está cadastrado.',

                'email.required'   => 'O email é obrigatório.',
                'email.email'      => 'Informe um email válido.',
                'email.unique'     => 'Este email já está cadastrado.',
            ],
            [
                'name'    => 'nome',
                'contact' => 'telefone',
                'email'   => 'email',
            ]
        );

        Contact::create($data);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate(
            [
                'name'    => 'required|min:5',
                'contact' => 'required|digits:9|unique:contacts,contact,' . $contact->id,
                'email'   => 'required|email|unique:contacts,email,' . $contact->id,
            ],
            [
                'name.required'    => 'O nome é obrigatório.',
                'name.min'         => 'O nome deve ter no mínimo 5 caracteres.',

                'contact.required' => 'O telefone é obrigatório.',
                'contact.digits'   => 'O telefone deve conter exatamente 9 dígitos.',
                'contact.unique'   => 'Este telefone já está cadastrado.',

                'email.required'   => 'O email é obrigatório.',
                'email.email'      => 'Informe um email válido.',
                'email.unique'     => 'Este email já está cadastrado.',
            ],
            [
                'name'    => 'nome',
                'contact' => 'telefone',
                'email'   => 'email',
            ]
        );

        $contact->update($data);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contato removido!');
    }
}
