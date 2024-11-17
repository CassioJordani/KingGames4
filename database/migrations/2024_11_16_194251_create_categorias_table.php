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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
        });

        DB::table('categorias')->insert([
            'id' => 1,
            'nome' => 'Ação'
        ]);

        DB::table('categorias')->insert([
            'id' => 2,
            'nome' => 'Aventura'
        ]);

        DB::table('categorias')->insert([
            'id' => 3,
            'nome' => 'Esporte'
        ]);

        DB::table('categorias')->insert([
            'id' => 4,
            'nome' => 'Estratégia'
        ]);

        DB::table('categorias')->insert([
            'id' => 5,
            'nome' => 'RPG'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};