<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    protected $table = "item_vendas";
    
    protected $fillable = [
        'id_nota_venda',
        'id_usuario',
        'id_produto',
        'quantidade',
        'valor'
    ];

    public function nota_venda(){
        return $this->belongsTo(NotaVenda::class, 'id_nota_venda', 'id');
    }
    
    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function produto(){
        return $this->belongsTo(Produto::class, 'id_produto', 'id');
    }
}