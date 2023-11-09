<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'marca',
        'tipo_equipo',
        'modelo',
        'anydesk',
        'tipo_ram',
        'cantidad_ram',
        'tipo_alma',
        'cantidad_alma',
        'licencia',
        'tipo_so',
        'arquitectura',
        'modo_bios',
        'version_procesador',
        'modelo_procesador',
        'gen_procesador',
        'direccionIP',
        'tarjeta_grafica',
        'ubicacion',
        'encargado',
    ];
}
