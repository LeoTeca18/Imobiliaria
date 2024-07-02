<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitas extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'id_imovel',
        'id_funcionario',
        'id_cliente',
        ];

        public function cliente()
        {
            return $this->belongsTo(clientes::class,  'id_cliente');
        }
        public function funcionario()
        {
            return $this->belongsTo(funcionario::class,  'id_funcionario');
        }
}