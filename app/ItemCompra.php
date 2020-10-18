<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCompra extends Model
{
    protected $table = "item_compras";

    protected $fillable = [
        'id_usuario',
        'id_produto',
        'id_nota_compra',
        'quantidade',
        'valor'
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function produto(){
        return $this->belongsTo(Produto::class, 'id_produto', 'id');
    }

    public function nota_compra(){
        return $this->belongsTo(NotaCompra::class, 'id_nota_compra', 'id');
    }
}