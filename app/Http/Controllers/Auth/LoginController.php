<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('user.bibliotecaJogos');
        }

        return redirect()->route('home');
    }
    public function login(Request $request)
    {
        // Validar os dados do formulário
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Regenerar a sessão para evitar fixação de sessão
            $request->session()->regenerate();

            // Redirecionar para a página inicial ou rota desejada
            return redirect()->intended('home');
        }

        // Retornar com erro se as credenciais não forem válidas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }
}