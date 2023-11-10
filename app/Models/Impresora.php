<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial',
        'modelo',
        'proveedor',
        'tipo',
        'ubicacion',
        'tipo_toner',
        'codigo',
       
    ];
}
