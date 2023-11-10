<?php

namespace App\Http\Controllers;

use App\Models\Impresora;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ImpresoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index(Request $request): View
{
    $filtro = $request->get('filtro', 'todas'); // Obtener el valor del filtro
    
    if ($filtro === 'propias') {
        $impresoras = Impresora::where('tipo', 'Propia')->latest()->paginate(20);
    } elseif ($filtro === 'alquiladas') {
        $impresoras = Impresora::where('tipo', 'Alquilada')->latest()->paginate(20);
    } else {
        $impresoras = Impresora::latest()->paginate(20);
    }

    
    //$impresoras = Impresora::all();

    // Laravel asumirá que quieres la vista 'impresoras.index' y pasará automáticamente los datos de las impresoras
    return view('impresoras.impresoras', ['impresoras' => $impresoras]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        Impresora::create($request -> all()); 
        return redirect()->route('impresoras.index')->with('success', 'Impresora agregada con éxito'); 
    
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(Impresora $impresora)
    {
         //
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Impresora $impresora)
    {
        return view('edit', ['impresora' => $impresora]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Impresora $impresora): RedirectResponse
    {
        $impresora->update($request ->all());
        return redirect()->route('impresoras.index')->with('update_success', 'Equipo actualizado con éxito');
    
    
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Impresora $impresora)
    {
        $impresora->delete();

        return redirect()->route('impresoras.index')->with('delete_success', 'Impresora Eliminada');//
    }
}
