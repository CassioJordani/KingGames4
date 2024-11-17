
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
                                    <tr>
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
                                <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>