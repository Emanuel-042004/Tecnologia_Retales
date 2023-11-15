<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celular extends Model
{
    use HasFactory;
   
    protected $table = 'celulares';
    protected $fillable = [
        'id',
        'marca',
        'modelo',
        'serial',
        'imei_1',
        'imei_2',
        'sim',
        'encargado',
        'ubicacion',
        'departamento'
    ];
}
