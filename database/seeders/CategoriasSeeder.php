<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria; // Importe a classe Categoria do namespace App\Models


class CategoriasSeeder extends Seeder
{
    public function run()
    {
        Categoria::create(['nome' => 'Ação']);
        Categoria::create(['nome' => 'Aventura']);
        Categoria::create(['nome' => 'FPS']);
        Categoria::create(['nome' => 'RPG']);
        Categoria::create(['nome' => 'Esportes']);
    }
}