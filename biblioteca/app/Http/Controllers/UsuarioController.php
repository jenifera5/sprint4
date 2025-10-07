<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index',compact('usuarios'));
    }

    
    public function create()
    {
        return view('usuarios.create');
    }

   
  public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->password 
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito');
    }
   
    public function show(Usuario $usuario)
    {
        return view('usuarios.edit',compact('usuario'));
    }

   
    public function edit(Usuario $usuario)
    {
       return view('usuarios.edit',compact('usuario'));
    }

    
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre'=>'required|string|max:50',
            'email'=>'required|email|unique:usuarios,email,' . $usuario->id,
        ]);

        $usuario->update([
            'nombre'=> $request->nombre,
            'email'=>  $request->email,
        ]);
        return redirect()->route('usuarios.index')->with('success','Usuario actualizado');
    }

    
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success','Usuario eliminado');
    }
}
