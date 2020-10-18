<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "usuarios";

    protected $fillable = [
        'id_pessoa', 'username', 'password', 'estado', 'nivel_acesso'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function item_compra()
    {
        return $this->hasMany(ItemCompra::class, 'id_usuario', 'id');
    }

    public function item_venda()
    {
        return $this->hasMany(ItemVenda::class, 'id_usuario', 'id');
    }
    
    public function nota_compra()
    {
        return $this->hasMany(NotaCompra::class, 'id_usuario', 'id');
    }

    public function nota_venda()
    {
        return $this->hasMany(NotaVenda::class, 'id_usuario', 'id');
    }
}