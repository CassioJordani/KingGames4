<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrinhosTable extends Migration
{
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->default(1);
            $table->foreignId('jogo_id')->constrained('jogos')->onDelete('cascade');
            $table->integer('quantidade')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
}