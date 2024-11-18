<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Jogos;

class CarrinhoController extends Controller
{
    public function index()
    {
        $jogos = Jogos::all();
        $carrinho = Carrinho::where('usuario_id', auth()->id())->get();
        return view('carrinho', compact('jogos', 'carrinho'));
    }

    public function adicionarAoCarrinho(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        $carrinho = Carrinho::where('usuario_id', auth()->id())->where('jogo_id', $id)->first();
        if ($carrinho) {
            $carrinho->quantidade++;
            $carrinho->save();
        } else {
            if (auth()->check() && auth()->id()) {
                $data = [
                    'usuario_id' => auth()->id(),
                    'jogo_id' => $id,
                    'quantidade' => 1,
                ];
                Carrinho::create($data);

            } else {
                return redirect()->route('login');
            }
        }
        return redirect()->route('carrinho');

        
    }

    public function removerDoCarrinho(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $carrinho = Carrinho::where('usuario_id', auth()->id())->where('jogo_id', $id)->first();
        if ($carrinho) {
            $carrinho->delete();
        }
        return redirect()->route('carrinho');
    }

    public function finalizarCompra()   
    {
        $carrinho = Carrinho::where('usuario_id', auth()->id())->get();
        return view('bibliotecaJogos', compact('carrinho'));
    }
}