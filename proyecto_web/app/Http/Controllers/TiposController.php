<?php

namespace App\Http\Controllers;
use App\Http\Requests\TipoRequest;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('admin-gestion'))
        {
            return redirect()->route('home.index');
        }
        $tipos = Tipo::orderBy('nombre')->get();
        return view('tipos.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoRequest $request)
    {
        $tipo = new Tipo();
        $tipo->nombre = $request->nombre;
        $tipo->valor = $request->valor;
        $tipo->save();
        return redirect()->route('tipos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Tipo::find($id);
        $tipo->nombre = $request->nombre;
        $tipo->valor = $request->valor;
        $tipo->save();
        return redirect()->route('tipos.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}
