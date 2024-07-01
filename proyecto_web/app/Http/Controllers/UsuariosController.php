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
        if(Gate::denies('admin-gestion'))
        {
            return redirect()->route('home.index');
        }
        $perfiles = Perfil::all();
        $usuarios = Usuario::orderBy('perfil_id')->get();
        return view('usuarios.index',compact('usuarios','perfiles'));
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
            if(Auth::user()->activo){
                return redirect()->route('home.index');
            }
            else{
                Auth::logout();
                return back()->withErrors('Usuario baneado')->onlyInput('email');

            }

        }
        return back()->withErrors('Credenciales incorrectas.')->onlyInput('email');
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
    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil_id;
        $usuario->save();
        return redirect()->route('usuarios.index');
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

        $perfiles = Perfil::all();
        $usuario = Usuario::where('email',$email)->first(); 
        return view('usuarios.edit',compact('usuario','perfiles'));
    }

    
    public function updateMe(UsuarioRequest $request, $email)
    {
        $usuario = Usuario::find($email);
        $usuario->email = $request->email;
        $usuario->nombre = $request->nombre;
        if($request->password != ''){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    public function update(UsuarioRequest $request, $email)
    {

        $usuario = Usuario::find($email);
        $usuario->email = $request->email;
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil_id;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsuarioRequest $request,$email)
    {
        $usuario = Usuario::find($email);
        if(Auth::user()->email == $usuario->email){
            return redirect()->route('usuarios.index');
        }
        $usuario->activo = false;
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    public function desban(UsuarioRequest $request,$email)
    {
        $usuario = Usuario::find($email);
        $usuario->activo = true;
        $usuario->save();

        return redirect()->route('usuarios.index');
    }


}
