<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    protected $table = "nota_compras";

    protected $fillable = [
        'id_usuario',
        'valor_total',
        'data_emissao',
        'data_vencimento',
        'desconto',
        'valor_pago'
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function item_compra(){
        return $this->hasMany(ItemCompra::class, 'id_nota_compra', 'id');
    }
}