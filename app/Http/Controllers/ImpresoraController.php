<?php

namespace App\Http\Controllers;

use App\Models\Impresora;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ImpresoraController extends Controller
{
  
    public function index(Request $request): View
    {

        $search = $request->input('search');
         $impresoras = Impresora::filter($search)->paginate(20);
        $filtro = $request->get('filtro', 'todas'); // Obtener el valor del filtro

        if ($filtro === 'propias') {
            $impresoras = Impresora::where('tipo', 'Propia')->latest()->paginate(20);
        } elseif ($filtro === 'alquiladas') {
            $impresoras = Impresora::where('tipo', 'Alquilada')->latest()->paginate(20);
        } else {
            $impresoras = Impresora::latest()->paginate(20);
        }
        return view('impresoras.impresoras', ['impresoras' => $impresoras]);
    }

    public function create(): View
    {
        return view('create');

    }

  
    public function store(Request $request): RedirectResponse
    {
        Impresora::create($request->all());
        return redirect()->route('impresoras.index')->with('success', 'Impresora agregada con éxito');
  
    }
   
    public function show(Impresora $impresora)
    {
        
    }

  
    public function edit(Impresora $impresora)
    {
        return view('edit', ['impresora' => $impresora]);
        
    }

   
    public function update(Request $request, Impresora $impresora): RedirectResponse
    {
        $impresora->update($request->all());
        return redirect()->route('impresoras.index')->with('update_success', 'Equipo actualizado con éxito');
  
    }

    
    public function destroy(Impresora $impresora)
    {
        $impresora->delete();
        return redirect()->route('impresoras.index')->with('delete_success', 'Impresora Eliminada'); 
    }
}
