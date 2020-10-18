<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClasseProduto extends Model
{
    protected $table = "classe_produtos";

    protected $fillable = [
        'classe'
    ];

    public function produto(){
        return $this->hasMany(Produto::class, 'id_classe_produto', 'id');
    }
}