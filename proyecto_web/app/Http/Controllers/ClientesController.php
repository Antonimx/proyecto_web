<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Arriendo;
use App\Http\Requests\ClienteRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        $cliente = new Cliente();
        $cliente->fill([
            'rut' => $request->rut,
            'nombre' => $request->nombre,
            'fono' => $request->fono,
        ]);
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($rut)
    {
        $cliente = Cliente::find($rut);
        $arriendosVigentes = Arriendo::where('rut',$rut)->whereNull('fecha_entrega')->get();
        $arriendosFinalizados = Arriendo::where('rut',$rut)->whereNotNull('fecha_entrega')->get();
        return view('clientes.show',compact('arriendosVigentes','arriendosFinalizados','cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($rut)
    {
        $cliente = Cliente::where('rut',$rut)->first(); 
        return view('clientes.edit',compact('cliente'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, $rut)
    {
        $cliente = Cliente::find($rut);
        $cliente->nombre = $request->nombre;
        $cliente->fono = $request->fono;
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
