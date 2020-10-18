<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";

    protected $fillable = [
        'id_pessoa',
        'id_cargo',
        'estado'
    ];


    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id');
    }

}