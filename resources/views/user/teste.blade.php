<!-- loja-app/resources/views/user/teste.blade.php -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Página de Teste</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Olá, {{ Auth::user()->name }}!</p>
                        <p>Você está logado como usuário não administrador.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
