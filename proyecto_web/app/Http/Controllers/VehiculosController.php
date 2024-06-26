<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;


class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::orderBy('nombre')->get();
        return view('vehiculos.index',compact('vehiculos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('vehiculos.create',compact('vehiculos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request)
    {
        $vehiculo = new Vehiculo();
        $vehiculo->fill([
            'patente' => $request->patente,
            'nombre' => $request->nombre,
            'descripcion' => $request->nombre,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'imagen' => $request->file('imagen')->store('public/vehiculos'),
            'tipo_id' => $request->tipo_id,
        ]);
        $vehiculo->save();
        return redirect()->route('vehiculos.index')->with('success','Datos guardados correctamente.');

    }

    //arriendos
    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($patente)
    {
        $vehiculo = Vehiculo::find($patente);
        return view('vehiculos.edit',compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoRequest $request, $patente)
    {
        $vehiculo = Vehiculo::find($patente);
        $vehiculo->fill([
            'patente' => $request->patente,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'tipo_id' => $request->tipo_id,
        ]);
        
        if ($request->hasFile('imagen')) {
            $vehiculo->imagen = $request->file('imagen')->store('public/vehiculos');
        }

        $vehiculo->save();
        return redirect()->route('vehiculos.index')->with('success','Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index');
    }
}
