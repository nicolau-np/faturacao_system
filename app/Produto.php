<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    protected $fillable = [
        'id_classe_produto',
        'id_tipo',
        'nome',
        'descricao',
        'data_caducidade',
        'quantidade',
        'codigo_barra',
        'codigo_qr'
    ];

    public function classe_produto()
    {
        return $this->belongsTo(ClasseProduto::class, 'id_classe_produto', 'id');
    }

    public function tipo_produto()
    {
        return $this->belongsTo(TipoProduto::class, 'id_tipo', 'id');
    }

    public function item_compra()
    {
        return $this->hasMany(ItemCompra::class, 'id_produto', 'id');
    }

    public function item_venda()
    {
        return $this->hasMany(ItemVenda::class, 'id_produto', 'id');
    }
}