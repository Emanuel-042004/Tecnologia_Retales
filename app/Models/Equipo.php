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
            ->orWhere('marca', 'like', '%' . $search . '%')
            ->orWhere('tipo_equipo', 'like', '%' . $search . '%')
            ->orWhere('modelo', 'like', '%' . $search . '%')
            ->orWhere('anydesk', 'like', '%' . $search . '%')
            ->orWhere('tipo_ram', 'like', '%' . $search . '%')
            ->orWhere('cantidad_ram', 'like', '%' . $search . '%')
            ->orWhere('tipo_alma', 'like', '%' . $search . '%')
            ->orWhere('cantidad_alma', 'like', '%' . $search . '%')
            ->orWhere('licencia', 'like', '%' . $search . '%')
            ->orWhere('tipo_so', 'like', '%' . $search . '%')
            ->orWhere('modo_bios', 'like', '%' . $search . '%')
            ->orWhere('version_procesador', 'like', '%' . $search . '%')
            ->orWhere('modelo_procesador', 'like', '%' . $search . '%')
            ->orWhere('gen_procesador', 'like', '%' . $search . '%')
            ->orWhere('direccionIP', 'like', '%' . $search . '%')
            ->orWhere('tarjeta_grafica', 'like', '%' . $search . '%')
            ->orWhere('ubicacion', 'like', '%' . $search . '%')
            ->orWhere('encargado', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
