<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BibliotecaJogosController extends Controller
{
    public function index()
    {
        return view('user.bibliotecaJogos');
    }
}