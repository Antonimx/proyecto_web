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
    
    public function gestionar()
    {
        $arriendos = Arriendo::where('fecha_entrega',null)->get();
        return view('arriendos.gestionar',compact('arriendos'));
    }
    
    public function ver()
    {
        $arriendos = Arriendo::orderBy('fecha_inicio','desc')->get();
        return view('arriendos.ver',compact('arriendos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($patente)
    {
        $clientes = Cliente::all(); 
        $vehiculo = Vehiculo::where('patente',$patente)->first(); 
        return view('arriendos.create',compact('clientes','vehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArriendoRequest $request)
    {
        $arriendo = new Arriendo();
        $arriendo->fecha_inicio = $request-> fecha_inicio;
        $arriendo->imagen_inicio = $request-> imagen_inicio;
        $arriendo->fecha_entrega = null;
        $arriendo->hora_entrega = null;
        $arriendo->imagen_entrega = null;
        $arriendo->rut = $request->rut;
        $arriendo->patente = $request->patente;
        $arriendo->save();

        //cambiar el estado del vehiculo
        $vehiculo = Vehiculo::where('patente',$request->patente)->get();
        $vehiculo -> estado = 2;
        $vehiculo->save();
        return redirect()->route('arriendos.index');

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
