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
                        @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Biblioteca de jogos</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">Registrar</a>
                        </li>
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

    <main class="container mt-4">
        <h1 class="text-center" style="color: #D9D9D9;">Jogos Digitais</h1>

        <p class="text-center" style="color: #555;">Navegue por nossa loja de jogos digitais</p>

        <div class="container">
            <h1>Jogos Digitais</h1>

            <form action="{{ route('public.home') }}" method="get" class="form-inline mb-4">
                <label for="categoria" class="mr-2">Filtrar por categoria:</label>
                <select name="categoria_id" id="categoria" class="form-control mr-2">
                    <option value="">Todas as categorias</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>


            <div class="carousel-container p-4 my-4" style="background-color: #444566;">
                <h2 class="text-center mb-4" style="color: #D9D9D9;">Em destaque</h2>

                <div id="promocoesCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-wrap="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/dead_by_daylight_imagem.png') }}" class="card-img-top" alt="Jogo 1">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #B94949;">Dead by Daylight</h5>
                                            <p class="card-text" style="color: #555;">Descrição do jogo 1.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/god_ragnarok_imagem.png') }}" class="card-img-top" alt="Jogo 2">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #B94949;">God of War Ragnarok</h5>
                                            <p class="card-text" style="color: #555;">Descrição do jogo 2.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/hogwarts_legacy_imagem.png') }}" class="card-img-top" alt="Jogo 3">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #B94949;">Hogwarts Legacy</h5>
                                            <p class="card-text" style="color: #555;">Descrição do jogo 3.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/league_of_legends_imagem.png') }}" class="card-img-top" alt="Jogo 4">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #B94949;">League of Legends</h5>
                                            <p class="card-text" style="color: #555;">Descrição do jogo 4.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/minecraft_imagem.png') }}" class="card-img-top" alt="Jogo 5">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #B94949;">Minecraft</h5>
                                            <p class="card-text" style="color: #555;">Descrição do jogo 5.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/no_mans_sky_imagem.png') }}" class="card-img-top" alt="Jogo 6">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #B94949;">No Man's Sky</h5>
                                            <p class="card-text" style="color: #555;">Descrição do jogo 6.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/assassins_creed_rogue_imagem.png') }}" class="card-img-top" alt="Jogo 7">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #B94949;">Assassin's Creed Rogue</h5>
                                            <p class="card-text" style="color: #555;">Descrição do jogo 7.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('img/buckshot_roulette_imagem.png') }}" class="card-img-top" alt="Jogo 8">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #FFFFFF;">Buckshot Roulette</h5>
                                            <p class="card-text" style="color: #FFFFFF;">Descrição do jogo 8.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#promocoesCarousel" role="button" data-slide="prev" style="width: 5%; background-color: red;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#promocoesCarousel" role="button" data-slide="next" style="width: 5%; background-color: red;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach($jogos as $jogo)
                    @if(request()->input('categoria_id') == '' || $jogo->categoria_id == request()->input('categoria_id'))
                        <div class="col-md-3">
                            <div class="card" style="width: 15rem;">
                                <img src="{{ asset('img/' . $jogo->imagem) }}" class="card-img-top" alt="Imagem do jogo">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $jogo->nome }}</h5>
                                    <p class="card-text-filtro">{{ $jogo->descricao }}</p>
                                    <p class="card-text-filtro">Categoria: {{ $jogo->categoria->nome }}</p>
                                    <p class="card-text-filtro">Preço: R$ {{ $jogo->preco }}</p>
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>

    <footer class="text-center py-3" style="background-color: #0F101E; color: #fff;">
        <p>&copy; 2024 King Games. Todos os direitos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
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
            color: #FFFFFF;
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
    </style>
</body>
</html>