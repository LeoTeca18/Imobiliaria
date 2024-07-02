<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'senha',
        'nome',
        'contacto',
        'tipo',
        'pedido',
        ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

     public $timestamps = false;
}