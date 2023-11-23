<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialCelular;
use App\Models\Celular;
use Illuminate\View\View;

class HistorialCelularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Celular $celular)
    {
        $historialCelular = HistorialCelular::where('serial', $celular->serial)
            ->latest()
            ->paginate(6);

        return view('telefonos.historialCelular', ['historialCelular' => $historialCelular, 'celular' => $celular]); //

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
    public function store(Request $request, Celular $celular)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $historial = new HistorialCelular([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
            'serial' => $celular->serial,
        ]);

        $historial->save(); //
        return redirect()->route('celulares.historial.index', $celular->id)
            ->with('success', 'Registro de historial agregado con éxito');
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
    public function edit(Celular $celular, HistorialCelular $historialCelular)
    {
        return view('telefonos.edit_h_Celular', ['historialCelular' => $historialCelular, 'celular' => $celular]); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Celular $celular, HistorialCelular $historialCelular)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $historialCelular->update([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),

        ]);
        return redirect()->route('celulares.historial.index', [$celular->id, $historialCelular->id])->with('update_success', 'Registro de historial agregado con éxito'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Celular $celular, HistorialCelular $historialCelular)
    {
        $historialCelular->delete();

        return redirect()->route('celulares.historial.index', $celular->id)->with('delete_success', 'Historial eliminado con éxito'); //
    }
}
