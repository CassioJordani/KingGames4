<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->string('nome');
            $table->string('descricao');
            $table->string('imagem');
            $table->decimal('preco', 8, 2);
        });

        DB::table('jogos')->insert([
            'nome' => 'Dead By Daylight',
            'descricao' => 'Jogo de estratégia',
            'imagem' => 'dead_by_daylight_imagem.png',
            'preco' => 99.99,
            'categoria_id' => 4
        ]);

        DB::table('jogos')->insert([
            'nome' => 'God of War',
            'descricao' => 'Jogo de ação',
            'imagem' => 'god_ragnarok_imagem.png',
            'preco' => 99.99,
            'categoria_id' => 1
        ]);

        DB::table('jogos')->insert([
            'nome' => 'Hogwarts Legacy',
            'descricao' => 'Jogo de aventura',
            'imagem' => 'hogwarts_legacy_imagem.png',
            'preco' => 59.99,
            'categoria_id' => 2
        ]);

        DB::table('jogos')->insert([
            'nome' => 'League of Legends',
            'descricao' => 'Jogo de RPG',
            'imagem' => 'league_of_legends_imagem.png',
            'preco' => 49.99,
            'categoria_id' => 5
        ]);

        DB::table('jogos')->insert([
            'nome' => 'Minecraft',
            'descricao' => 'Jogo de Aventura',
            'imagem' => 'minecraft_imagem.png',
            'preco' => 39.99,
            'categoria_id' => 2
        ]);

        DB::table('jogos')->insert([
            'nome' => 'No Mans Sky',
            'descricao' => 'Jogo de ação',
            'imagem' => 'no_mans_sky_imagem.png',
            'preco' => 69.99,
            'categoria_id' => 1
        ]);

        DB::table('jogos')->insert([
            'nome' => 'Assassins Creed Rogue',
            'descricao' => 'Jogo de aventura',
            'imagem' => 'assassins_creed_rogue_imagem.png',
            'preco' => 89.99,
            'categoria_id' => 2
        ]);

        DB::table('jogos')->insert([
            'nome' => 'Buckshot Roulette',
            'descricao' => 'Jogo de esporte',
            'imagem' => 'buckshot_roulette_imagem.png',
            'preco' => 59.99,
            'categoria_id' => 3
        ]);

        DB::table('jogos')->insert([
            'nome' => 'Bully',
            'descricao' => 'Jogo de aventura',
            'imagem' => 'bully.jpg',
            'preco' => 29.99,
            'categoria_id' => 2
        ]);

        DB::table('jogos')->insert([
            'nome' => 'GTA VI',
            'descricao' => 'Jogo de ação',
            'imagem' => 'gta-vi.png',
            'preco' => 169.99,
            'categoria_id' => 2
        ]);

        DB::table('jogos')->insert([
            'nome' => 'Alan Wake',
            'descricao' => 'Jogo de aventura',
            'imagem' => 'alan_wake_2.png',
            'preco' => 139.99,
            'categoria_id' => 2
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};