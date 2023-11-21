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

    public function mantenimiento(){
        return $this->morphOne(Mantenimiento::class,'mantenible');
    }
    protected static function booted()
    {
        static::deleting(function ($equipo) {
            $equipo->mantenimiento()->delete();
        });
    }

    public function scopeFilter($query, $search)
    {
        if ($search) {
            $query->where('serial', 'like', '%' . $search . '%')
                  ->orWhere('encargado', 'like', '%' . $search . '%')
                  ->orWhere('marca', 'like', '%' . $search . '%')
                  ->orWhere('modelo', 'like', '%' . $search . '%')
                  ->orWhere('anydesk', 'like', '%' . $search . '%')
                  ->orWhere('direccionIP', 'like', '%' . $search . '%')
                  ->orWhere('ubicacion', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
