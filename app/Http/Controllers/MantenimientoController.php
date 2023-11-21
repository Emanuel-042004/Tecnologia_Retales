<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\Equipo;
use App\Models\Impresora;
use App\Models\Celular;
use App\Models\Telefono;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tipo, $id)
    {
        $mantenible = $this->getMantenible($tipo, $id);
    
        $mantenimientos = $mantenible->mantenimiento()->get();
        $mantenimientos = $mantenible->mantenimiento()->paginate(5);
    
        return view('mantenimientos.mantenimientos', compact('mantenible', 'mantenimientos', 'tipo', 'id'));
    }
    
    private function getMantenible($tipo, $id)
    {
        switch ($tipo) {
            case 'equipos':
                return Equipo::find($id);
            case 'impresoras':
                return Impresora::find($id);
            case 'celulares':
                return Celular::find($id);
            case 'telefonos':
                return Telefono::find($id);
            // Agrega más casos según tus modelos
            default:
                abort(404); // Manejar el caso en que el tipo no coincide con ningún modelo
        }
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $tipo, $id)
    {
        $mantenible = $this->getMantenible($tipo, $id);

        // Lógica para almacenar el nuevo mantenimiento en la base de datos
        $mantenimiento = new Mantenimiento;
        $mantenimiento->descripcion = $request->input('descripcion');
        $mantenimiento->fecha = $request->input('fecha');
        // Otras propiedades del mantenimiento según tu modelo

        // Asociar el mantenimiento al modelo mantenido (Equipo, Impresora, etc.)
        $mantenible->mantenimiento()->save($mantenimiento);

        return redirect()->route('mantenimientos.index', ['tipo' => $tipo, 'id' => $id])
            ->with('success', 'Mantenimiento creado exitosamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tipo, $id, $mantenimientoId)
    {
        $mantenible = $this->getMantenible($tipo, $id);
        $mantenimiento = Mantenimiento::findOrFail($mantenimientoId);

        return view('mantenimientos.edit', compact('mantenible', 'mantenimiento', 'tipo', 'id'));
    }

    public function update(Request $request, $tipo, $id, $mantenimientoId)
    {
        $mantenible = $this->getMantenible($tipo, $id);
        $mantenimiento = Mantenimiento::findOrFail($mantenimientoId);

        // Lógica para actualizar el mantenimiento en la base de datos
        $mantenimiento->descripcion = $request->input('descripcion');
        $mantenimiento->fecha = $request->input('fecha');
        // Otras propiedades del mantenimiento según tu modelo

        $mantenimiento->save();

        return redirect()->route('mantenimientos.index', ['tipo' => $tipo, 'id' => $id])
            ->with('success', 'Mantenimiento actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tipo, $id, $mantenimientoId)
    {
        $mantenible = $this->getMantenible($tipo, $id);
        $mantenimiento = Mantenimiento::findOrFail($mantenimientoId);
    
        // Eliminar el mantenimiento de la base de datos
        $mantenimiento->delete();
    
        return redirect()->route('mantenimientos.index', ['tipo' => $tipo, 'id' => $id])
            ->with('delete_success', 'Mantenimiento eliminado exitosamente');
    }
}
