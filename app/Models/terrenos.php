<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terrenos extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'bairro',
        'preco',
        'zona',
        'id_cliente',
        'estado',
        'nome',
        'img',
        'descrição',
       ];
       public function cliente()
       {
        return $this->belongsTo(clientes::class,  'id_cliente');
    }

    public $timestamps = false;
}