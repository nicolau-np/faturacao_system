<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotaVenda extends Model
{
    protected $table = "nota_vendas";

    protected $fillable = [
        'id_usuario',
        'valor_total',
        'desconto',
        'status',
        'mes',
        'ano'
    ];

    public function item_venda()
    {
        return $this->hasMany(ItemVenda::class, 'id_nota_venda', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}