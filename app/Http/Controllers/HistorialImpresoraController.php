<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\HistorialImpresora;
use App\Models\Impresora;
use Illuminate\View\View;

class HistorialImpresoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Impresora $impresora) 
    {
        $historialImpresora = HistorialImpresora::where('serial', $impresora->serial)
            ->latest()
            ->paginate(20);
    
            return view('impresoras.historial', ['historialImpresora' => $historialImpresora, 'impresora' => $impresora]);

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
    public function store(Request $request, Impresora $impresora)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);
    
        $historial = new HistorialImpresora([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
            'serial' => $impresora->serial,
        ]);
    
        $historial->save();
    
        return redirect()->route('impresoras.historial.index', $impresora->id)
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
    public function edit(Impresora $impresora, HistorialImpresora $historialImpresora)
    {
        return view('impresoras.edit_h', ['historialImpresora' => $historialImpresora, 'impresora' => $impresora]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Impresora $impresora, HistorialImpresora $historialImpresora)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
        ]);

        $historialImpresora->update([
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('impresoras.historial.index', [$impresora->id, $historialImpresora->id])->with('update_success', 'Historial actualizado con éxito');//
    }

    /**
     * Remove the specified resource from storage.
     */

     // HistorialImpresoraController.php

        public function destroy(Impresora $impresora, HistorialImpresora $historialImpresora)
        {
            $historialImpresora->delete();

            return redirect()->route('impresoras.historial.index', $impresora->id)->with('delete_success', 'Historial eliminado con éxito');
        }

  
}
