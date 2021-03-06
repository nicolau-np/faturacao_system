<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

    protected $fillable = [
        'id_municipio',
        'nome',
        'data_nascimento',
        'genero',
        'estado_civil',
        'naturalidade',
        'telefone',
        'bilhete',
        'data_emissao',
        'local_emissao',
        'pai',
        'mae',
        'comuna'
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, 'id_pessoa', 'id');
    }

    public function usuario()
    {
        return $this->hasOne(Funcionario::class, 'id_pessoa', 'id');
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id_pessoa', 'id');
    }
}