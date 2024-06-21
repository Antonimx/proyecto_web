<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArriendoRequest;
use App\Models\Arriendo;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class ArriendosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::where('estado',1)->get();
        return view('arriendos.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all(); 
        $vehiculos = Vehiculo::all(); 
        return view('arriendos.create',compact('clientes','vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArriendoRequest $request)
    {
        $arriendo = new Arriendo();
        $arriendo->fecha_inicio = $request-> fecha_inicio;
        $arriendo->imagen_inicio = $request->imagen_inicio;
        $arriendo->rut = $request->rut;
        $arriendo->patente = $request->patente;
        $arriendo->save();
        return redirect()->route('arriendos.index');

    }

    public function gestionar()
    {
        $arriendos = Arriendo::where('fecha_entrega',null)->get();
        return view('arriendos.gestioanr',compact('arriendos'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Arriendo $arriendo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arriendo $arriendo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arriendo $arriendo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arriendo $arriendo)
    {
        //
    }
}