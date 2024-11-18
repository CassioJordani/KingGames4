<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2F2C3E; margin-top: -10px;">
            <a class="navbar-brand" href="{{ route('public.home') }}">
                <img src="{{ asset('img/Logo1.png') }}" alt="Logo" style="height: 100px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('public.home') }}">Home</a>
                    </li>

                    @auth
                        @if(auth()->user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard de Administrador</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('user.bibliotecaJogos') }}">Biblioteca de jogos</a>
                            </li>
                            <li>
                                <a href="/carrinho">
                                    <img src="https://img.icons8.com/ios-glyphs/30/FFFFFF/shopping-cart.png" width="30" height="30">
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">Registrar</a>
                        </li>
                        <div id="carrinho"></div>
                    @else
                        <li class="nav-item">
                            <span class="nav-link text-white">{{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign-Out
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot {
            background-color: #f9f9f9;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Carrinho de Compras</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table>
                            <thead>
                                <tr>
                                    <th>Nome do Jogo</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Subtotal</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carrinho as $item)
                                    <tr class="tabela">
                                        <td>{{ $item->jogo->nome }}</td>
                                        <td>{{ $item->quantidade }}</td>
                                        <td>{{ $item->jogo->preco }}</td>
                                        <td>{{ $item->quantidade * $item->jogo->preco }}</td>
                                        <td>
                                            <a href="{{ route('remover-do-carrinho', $item->jogo_id) }}" class="btn btn-danger">Remover</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="tabela">
                                    <td colspan="3">Total:</td>
                                    <td> 
                                        @php
                                            $total = 0;
                                            foreach ($carrinho as $item) {
                                                $total += $item->quantidade * $item->jogo->preco;
                                            }
                                        @endphp
                                        {{ $total }}
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <a href="{{ route('user.bibliotecaJogos') }}" class="btn btn-primary">
                            Finalizar Compra
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center py-3" style="background-color: #0F101E; color: #fff;">
        <p>&copy; 2024 King Games. Todos os direitos reservados.</p>
    </footer>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>

    <script>

    </script>
    <style>
        .tabela{
            background-color: #22243C;
            color: #fff;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #22243C;
        }
        .carousel-container {
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card {
            border: 1px solid #ffffff;
            border-radius: 5px;
            transition: transform 0.2s, box-shadow 0.2s;
            background-color: #18192B;
            margin-bottom: 100px;
            margin-top: 20px;
        }

        .card-header{
            background-color: #18192B;
            color: #fff;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
            transition: transform 0.2s, filter 0.2s;
        }
        .card-img-top:hover {
            transform: scale(1.05);
            filter: brightness(0.8);
        }

        .card-title {
            color: #FFFFFF;
        }

        .card-text-filtro {
            color: #D6D6D6;
        }
        .col-md-3 {
            margin-right: 0px;
            margin-bottom: 5px;
        }
        .carousel-control-prev, .carousel-control-next {
            width: 5%;
        }
        .carousel-item {
            transition: transform 1s ease, opacity 1s ease;
        }

        .btn {
            background-color: #660000;
            border-color: #660000;
            color: #fff;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        }
        .btn:hover {
            background-color: #AA0000;
            border-color: #AA0000;

        }
    </style>