<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
   
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index',compact('libros'));
    }

   
    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required|max:45',
            'autor'=>'required|max:45',
            'anio'=>'required|digits:4|integer|min:1000|max:' .now()->year,
            'disponibles'=>'required|integer|min:0'

        ]);
        Libro::create($request->all());
        return redirect()->route('libros.index')->with('success','Libro creado Correctamente');
    }

    
    public function show(Libro $libro)
    {
        return view('libros.show',compact('libro'));
    }

   
    public function edit(Libro $libro)
    {
        return view('libros.edit',compact('libro'));
    }

 
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo'=>'required|string|max:45',
            'autor'=>'required|string|max:45',
            'anio'=>'required|digits:4|integer|min:1000|max:'.now()->year,
            'disponibles'=>'required|integer|min:0',
        ]);
    
        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success','Libro actualizado correctamente');
    }

    
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success','Libro eliminado correctamente');
    }
}
