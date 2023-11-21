<?php

namespace App\Http\Controllers;

use App\Models\Celular;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CelularController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $celulares = Celular::filter($search)->paginate(20);
        $celulares = Celular::all();
        return view('telefonos.celulares', ['celulares' => $celulares]); //
    }

   
    public function create(): View
    {
        return view('create');
    }

   
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        // Eliminar los elementos vacíos del array
        $data = array_filter($data);

        Celular::create($data);
        return redirect()->route('celulares.index')->with('success', 'Celular agregado con éxito');
    }

   
    public function show(Celular $celular)
    {
        
    }

   
    public function edit(Celular $celular)
    {

        return view('edit', ['celular' => $celular]);
    }

   
    public function update(Request $request, Celular $celular): RedirectResponse
    {
        $data = $request->all();

        // Eliminar los elementos vacíos del array
        $data = array_filter($data);

        $celular->update($data);
        return redirect()->route('celulares.index')->with('success', 'Celular actualizado con éxito');
    }

    
    public function destroy(Celular $celular)
    {
        $celular->delete();
        return redirect()->route('celulares.index')->with('delete_success', 'Celular eliminado con éxito'); //
    }
}
