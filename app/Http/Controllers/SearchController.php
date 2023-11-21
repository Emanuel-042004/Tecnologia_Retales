<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use App\Models\Impresora;
use App\Models\Celular;
use App\Models\Telefono;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $equipos = Equipo::filter($search)->get();
    $impresoras = Impresora::filter($search)->get();
    $celulares = Celular::filter($search)->get();
    $telefonos = Telefono::filter($search)->get();
    return view('search', compact('equipos', 'impresoras', 'celulares', 'telefonos'));
}//
}

