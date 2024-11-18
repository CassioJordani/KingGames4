<?php
// tests/Unit/ProdutoTest.php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Produto;

class ProdutoTest extends TestCase
{
    public function test_produto_factory_cria_produto_com_nome_e_preco()
    {
        $produto = Produto::factory()->create();

        $this->assertNotNull($produto->nome);
        $this->assertNotNull($produto->preco);
    }

    public function test_produto_pode_ser_criado_com_nome_e_preco_personalizados()
    {
        $produto = Produto::factory()->create([
            'nome' => 'Produto Teste',
            'preco' => 19.99,
        ]);

        $this->assertEquals('Produto Teste', $produto->nome);
        $this->assertEquals(19.99, $produto->preco);
    }
}