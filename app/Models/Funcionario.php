<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'senha',
        'nome',
        'cargo',
        'salario',
        'id_agencia',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    public function agencia()
    {
        return $this->belongsTo(agencias::class,  'id_agencia');
    } 
}