<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Mantenimiento;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request): View
    {
        $search = $request->input('search');
         $equipos = Equipo::filter($search)->paginate(10);
         
        $filtro = $request->get('filtro', 'todos'); // Obtener el valor del filtro
        if ($filtro === 'propios') {
            $equipos = Equipo::where('tipo_equipo', 'Propio')->latest()->paginate(12);
        } elseif ($filtro === 'alquilados') {
            $equipos = Equipo::where('tipo_equipo', 'Alquilado')->latest()->paginate(12);
        } else {
            $equipos = Equipo::latest()->paginate(12);
        }
    
        return view('equipos.equipos', ['equipos' => $equipos]);
    }
    

   

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('equipos.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        Equipo::create($request -> all()); 
        return redirect()->route('equipos.index')->with('success', 'Equipo agregado con éxito'); 
    
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', ['equipo' => $equipo]); //
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo): RedirectResponse
    {
        $equipo->update($request ->all());
        return redirect()->route('equipos.index')->with('update_success', 'Equipo actualizado con éxito');
    
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo): RedirectResponse
    {
        \DB::table('historial')->where('serial', $equipo->serial)->delete();
       
        $equipo->delete();

        return redirect()->route('equipos.index')->with('delete_success', 'Equipo Eliminado'); //
    }



    
}
