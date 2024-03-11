<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuadro extends Model
{
    protected $fillable = [
        'nombre',
        'autor',
        'precio_euros',
        'ubicacion',
        'descripcion',
        'valoracion',
        'votos',
    ];
}
