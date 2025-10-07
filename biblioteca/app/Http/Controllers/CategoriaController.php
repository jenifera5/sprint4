<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index',compact('categorias'));

    }

   
    public function create()
    {
        return view('categorias.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:45',
            'descripcion'=>'nullable|max:100',
        ]);
        Categoria::create($request->all());
        
        return redirect()->route('categorias.index')->with('success','Categoria creada correctamente .');
    }

   
   public function show(Categoria $categoria)
{
    // Cargar los libros que pertenecen a la categoría
    $libros = $categoria->libros;  

    return view('categorias.show', compact('categoria', 'libros'));
}


    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }


   
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' =>'required|string|max:45',
            'descripcion'=>'required|string|max:100',
            
        ]);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success','Categoria actualizado correctamente.');
    }

    
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success','Categoria eliminada correctamente');
    }
}
