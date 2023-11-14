<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Equipo $equipo )
    {
        $historial = Historial::where('serial', $equipo->serial)
        ->latest()
        ->paginate(20);
              
        return view('historial', ['historial' => $historial, 'equipo' => $equipo]);
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
    
        $historial = new Historial([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
            'serial' => $equipo->serial,
        ]);
    
        $historial->save();
    
        return redirect()->route('historial.index', $equipo->id)->with('success', 'Registro de historial agregado con éxito');
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
    public function edit(Equipo $equipo, Historial $historial)
    {
        return view('edithe', ['equipo' => $equipo, 'historial' => $historial]);
        

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo, Historial $historial)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $historial->update([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('historial.index', [$equipo->id, $historial->id])->with('update_success', 'Historial actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo, Historial $historial)
    {
        $historial->delete();

        return redirect()->route('historial.index', $equipo->id)->with('delete_success', 'Historial eliminado ');
    }
}
