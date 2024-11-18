<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;



class BibliotecaJogosController extends Controller
{
    public function index()
    {
        $carrinho = Carrinho::where('usuario_id', auth()->id())
            ->with('jogo') // carrega os dados do jogo junto com o carrinho
            ->get();
        return view('user.bibliotecaJogos', compact('carrinho'));
    }
}

