<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agencias extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'local',
                 ];
}