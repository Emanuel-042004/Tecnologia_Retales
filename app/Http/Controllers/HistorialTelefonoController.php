<?php

namespace App\Http\Controllers;

use App\Models\HistorialTelefono;
use Illuminate\Http\Request;
use App\Models\Telefono;
use Illuminate\View\View;

class HistorialTelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Telefono $telefono)
    {
        $historialTelefono = HistorialTelefono::where('serial', $telefono->serial)
            ->latest()
            ->paginate(6);

        return view('telefonos.historialTelefono', ['historialTelefono' => $historialTelefono, 'telefono' => $telefono]); //

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
    public function store(Request $request, Telefono $telefono)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $historial = new HistorialTelefono([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
            'serial' => $telefono->serial,
        ]);

        $historial->save(); //
        return redirect()->route('telefonos.historial.index', $telefono->id)
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
    public function edit(Telefono $telefono, HistorialTelefono $historialTelefono)
    {
        return view('telefonos.edit_h_Telefono', ['historialTelefono' => $historialTelefono, 'telefono' => $telefono]); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Telefono $telefono, HistorialTelefono $historialTelefono)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $historialTelefono->update([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),

        ]);
        return redirect()->route('telefonos.historial.index', [$telefono->id, $historialTelefono->id])->with('update_success', 'Registro de historial agregado con éxito'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Telefono $telefono, HistorialTelefono $historialTelefono)
    {
        $historialTelefono->delete();

        return redirect()->route('telefonos.historial.index', $telefono->id)->with('delete_success', 'Historial eliminado con éxito'); //
    }
}


