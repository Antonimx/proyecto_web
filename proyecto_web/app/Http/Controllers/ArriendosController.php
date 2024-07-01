<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArriendoRequest;
use App\Models\Arriendo;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Support\Carbon;
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
        $arriendosVigentes = Arriendo::whereNull('fecha_entrega')->get();
        $arriendosFinalizados = Arriendo::whereNotNull('fecha_entrega')->get();
        $fecha_hoy = Carbon::now()->toDateString(); // Obtiene la fecha actual en formato 'Y-m-d'

        return view('arriendos.gestionar',compact('arriendosVigentes','arriendosFinalizados','fecha_hoy'));
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
        $arriendo->fill([
            'fecha_inicio' => $request-> fecha_inicio,
            'hora_inicio' => $request-> hora_inicio,
            'imagen_inicio' => $request-> imagen_inicio,
            'rut' => $request-> rut,
            'patente' => $request-> patente,
        ]);
        $arriendo->save();

        //actualizar estado del vehiculo a arrendado (2)
        Vehiculo::where('patente',$request->patente)->update(['estado'=>2]);

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArriendoRequest $request, $id)
    {
        $arriendo = Arriendo::find($id);
        
        if ($request->hasFile('imagen_entrega')) {
            $arriendo->imagen_entrega = $request->file('imagen_entrega')->store('public/imgs/vehiculos_entrega');
        }

        $arriendo->fecha_entrega = $request->fecha_entrega;
        $arriendo->hora_entrega = $request->hora_entrega;
        $arriendo->save();
        
        // updatear el vehiculo a disponible (1)
        Vehiculo::where('patente',$arriendo->patente)->update(['estado'=>1]);

        return redirect()->route('arriendos.gestionar');
        //->with('success','Entrega añaddida correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arriendo $arriendo)
    {
        //
    }
}
