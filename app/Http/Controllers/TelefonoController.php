<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $telefonos = Telefono::filter($search)->paginate(10);
        $telefonos = Telefono::all();
        $telefonos = Telefono::latest()->paginate(12);
        return view('telefonos.telefonos', ['telefonos' => $telefonos]); // //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('createTelefono');
    }


    public function store(Request $request): RedirectResponse
    {


        Telefono::create($request->all());
        return redirect()->route('telefonos.index')->with('success', 'Celular agregado con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show(Telefono $telefono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Telefono $telefono)
    {
        return view('editTelefono', ['telefono' => $telefono]); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Telefono $telefono): RedirectResponse
    {
        $telefono->update($request->all());
        return redirect()->route('telefonos.index')->with('update_success', 'Telefono actualizado con éxito');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Telefono $telefono)
    {
        $telefono->delete();
        return redirect()->route('telefonos.index')->with('delete_success', 'Celular eliminado con éxito'); // //
    }
}
