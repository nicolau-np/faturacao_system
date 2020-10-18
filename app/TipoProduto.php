<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $table = "tipo_produtos";

    protected $fillable = [
        'tipo'
    ];

    public function produto(){
        return $this->hasMany(Produto::class, 'id_tipo', 'id');
    }
}