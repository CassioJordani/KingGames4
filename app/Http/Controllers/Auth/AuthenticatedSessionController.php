<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // Outros métodos...

    /**
     * Logout do usuário e redireciona para a página inicial.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        // Limpar todos os dados da sessão
        $request->session()->flush();

        // Invalidar a sessão
        $request->session()->invalidate();

        // Regenerar o token da sessão
        $request->session()->regenerateToken();

        return redirect('/'); // Redireciona para a página inicial
    }
}