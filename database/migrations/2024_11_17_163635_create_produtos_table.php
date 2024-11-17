<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->decimal('preco', 10, 2);
            $table->timestamps();
        });
    
        DB::table('produtos')->insert([
            'nome' => 'Dead by Daylight',
            'descricao' => 'Jogo de estratégia',
            'preco' => 99.99,
        ]);
    
        DB::table('produtos')->insert([
            'nome' => 'God of War',
            'descricao' => 'Jogo de ação',
            'preco' => 99.99,
        ]);
    
        DB::table('produtos')->insert([
            'nome' => 'Hogwarts Legacy',
            'descricao' => 'Jogo de aventura',
            'preco' => 59.99,
        ]);
    
        DB::table('produtos')->insert([
            'nome' => 'League of Legends',
            'descricao' => 'Jogo de RPG',
            'preco' => 49.99,
        ]);
    
        DB::table('produtos')->insert([
            'nome' => 'Minecraft',
            'descricao' => 'Jogo de construção',
            'preco' => 29.99,
        ]);
    
        DB::table('produtos')->insert([
            'nome' => 'Assassins Creed',
            'descricao' => 'Jogo de aventura',
            'preco' => 99.99,
        ]);
    
    }
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}