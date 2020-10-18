<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = "fornecedors";

    protected $fillable = [
        'id_municipio',
        'entidade',
        'descricao',
        'telefone',
        'endereco'
    ];

    public function muncipio(){
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }
}