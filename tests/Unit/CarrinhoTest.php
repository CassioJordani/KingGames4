
<?php
/*
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarrinhoTest extends TestCase
{
    use RefreshDatabase;

    public function test_adicionar_produto_ao_carrinho(): void
    {
        // Arrange
        $produto = new Produto();
        $produto->nome = 'Produto 1';
        $produto->preco = 10.99;
        $produto->save();

        // Act
        $response = $this->post('/carrinho/adicionar', [
            'produto_id' => $produto->id,
            'quantidade' => 1,
        ]);

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Produto 1 adicionado ao carrinho');
        $this->assertDatabaseHas('carrinho', [
            'produto_id' => $produto->id,
            'quantidade' => 1,
        ]);
    }

    public function test_remover_produto_do_carrinho(): void
    {
        // Arrange
        $produto = new Produto();
        $produto->nome = 'Produto 1';
        $produto->preco = 10.99;
        $produto->save();

        // Act
        $response = $this->post('/carrinho/adicionar', [
            'produto_id' => $produto->id,
            'quantidade' => 1,
        ]);

        $response = $this->post('/carrinho/remover', [
            'produto_id' => $produto->id,
        ]);

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Produto 1 removido do carrinho');
        $this->assertDatabaseMissing('carrinho', [
            'produto_id' => $produto->id,
        ]);
    }
}

*/
