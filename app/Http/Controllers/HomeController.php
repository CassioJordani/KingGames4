<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Categoria; // supondo que você tenha um modelo Categoria
use App\Models\Jogos; // supondo que você tenha um modelo Jogos

class HomeController extends Controller
{
    /**
     * Construtor para aplicar middleware de autenticação.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Mostra a página inicial para usuários autenticados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
public function index(Request $request)
{
    $categorias = Categoria::all();
    $jogos = Jogos::when($request->has('categoria_id'), function ($query) use ($request) {
        return $query->where('categoria_id', $request->categoria_id);
    })->get();

    // Adicione um dd() aqui para verificar o que está sendo passado como ID
    dd($request->categoria_id);

    return view('welcome', compact('categorias', 'jogos'));
}

    /**
     * Mostra a página inicial para visitantes.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function publicHome(Request $request)
     {
         // Obter todas as categorias
         $categorias = Categoria::all();
         
         // Obter jogos com base na categoria selecionada
         $jogos = Jogos::when($request->categoria_id, function ($query) use ($request) {
             return $query->where('categoria_id', $request->categoria_id);
         })->get();
     
         return view('welcome', compact('categorias', 'jogos'));
     }
}


// No arquivo HomeController.php
