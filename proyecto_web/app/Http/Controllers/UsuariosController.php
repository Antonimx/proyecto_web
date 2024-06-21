<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('usuarios-gestion'))
        {
            return redirect()->route('home.index');
        }

        $usuarios = Usuario::orderBy('nombre')->get();
        return view('usuarios.index',compact('usuarios'));
    }
    
    public function login()
    {
        return view('usuarios.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('usuarios.login');
    }

    public function autenticar(Request $request)
    {
        // $credenciales = ['email'=>$request->email,'password'=>$request->password];
        $credenciales = $request->only(['email','password']);

        if(Auth::attempt($credenciales))
        {
            //credenciales correctas
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
        return back()->withErrors('Credenciales incorrectas.')->onlyInput('email');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perfiles = Perfil::all();
        return view('usuarios.create',compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil_id;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success','Datos guardados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($email)
    {
        $usuario = Usuario::find($email);
        $perfiles = Perfil::all();
        return view('usuarios.edit',compact('usuario','perfiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, $email)
    {
        $usuario = Usuario::find($email);

        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil_id;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success','Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
