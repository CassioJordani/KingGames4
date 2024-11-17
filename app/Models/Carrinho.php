<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = [
        'user_id',
        'jogo_id',
        'quantidade',
    ];
    public function jogo()
    {
    return $this->belongsTo(Jogos::class);
    }   
}
