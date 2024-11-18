<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;


class AutenticacaoTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_usuario_autenticado(): void
    {
        // Arrange
        $usuario = new User();
        $usuario->email = 'usuario@example.com';
        $usuario->password = 'senha123';
        $usuario->name = 'Usuario Exemplo'; // Adicione essa linha
        $usuario->save();
    
        // Act
        $response = $this->actingAs($usuario)
            ->get('/');
    
        // Assert
        $response->assertStatus(200);
    }
        public function test_usuario_nao_autenticado(): void
    {
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(401);
    }


}