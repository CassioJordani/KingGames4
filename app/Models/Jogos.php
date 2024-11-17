<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogos extends Model
{
    protected $fillable = ['nome', 'descricao', 'imagem', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}

