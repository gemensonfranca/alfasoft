<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email'    => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'email.required'    => 'O email é obrigatório.',
                'email.email'       => 'Informe um email válido.',

                'password.required' => 'A senha é obrigatória.',
                'password.min'      => 'A senha deve ter no mínimo 6 caracteres.',
            ],
            [
                'email'    => 'email',
                'password' => 'senha',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->route('contacts.index')
                ->with('success', 'Login realizado com sucesso!');
        }

        return back()
            ->withErrors([
                'email' => 'Email ou senha inválidos.'
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}