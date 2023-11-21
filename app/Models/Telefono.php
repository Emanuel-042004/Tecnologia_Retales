<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;
    protected $table = 'telefonos';
    protected $fillable = [
    'marca',
    'serial',
    'modelo',
    'ip',
    'extension',
    'ubicacion',
    'departamento'
  ];
  public function mantenimiento(){
    return $this->morphOne(Mantenimiento::class,'mantenible');
  }
  
  protected static function booted()
    {
        static::deleting(function ($telefono) {
            $telefono->mantenimiento()->delete();
        });
    }

    public function scopeFilter($query, $search)
    {
        if ($search) {
            $query->where('serial', 'like', '%' . $search . '%')
                  ->orWhere('extension', 'like', '%' . $search . '%')
                  ->orWhere('ubicacion', 'like', '%' . $search . '%')
                  ->orWhere('marca', 'like', '%' . $search . '%')
                  ->orWhere('modelo', 'like', '%' . $search . '%')
                 ->orWhere('departamento', 'like', '%' . $search . '%')
                ->orWhere('ip', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
