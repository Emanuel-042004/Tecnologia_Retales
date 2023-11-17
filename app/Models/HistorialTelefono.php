<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialTelefono extends Model
{
    use HasFactory;
    protected $table = 'historial';
    protected $fillable = [
        'fecha',
        'descripcion',
        'serial',
       
    ];
}
