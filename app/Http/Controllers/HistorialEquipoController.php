<?php

namespace App\Http\Controllers;

use App\Models\HistorialEquipo;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HistorialEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Equipo $equipo )
    {
        $historial = HistorialEquipo::where('serial', $equipo->serial)
        ->latest()
        ->paginate(20);
              
        return view('equipos.historial', ['historial' => $historial, 'equipo' => $equipo]);
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
    public function store(Request $request, Equipo $equipo)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);
    
        $historial = new HistorialEquipo([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
            'serial' => $equipo->serial,
        ]);
    
        $historial->save();
    
        return redirect()->route('equipos.historial.index', $equipo->id)->with('success', 'Registro de historial agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo, HistorialEquipo $historial)
    {
        return view('equipos.edit_h_Equipo', ['equipo' => $equipo, 'historial' => $historial]);
        

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo, HistorialEquipo $historial)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $historial->update([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('equipos.historial.index', [$equipo->id, $historial->id])->with('update_success', 'Historial actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo, HistorialEquipo $historial)
    {
        $historial->delete();

        return redirect()->route('equipos.historial.index', $equipo->id)->with('delete_success', 'Historial eliminado ');
    }
}
