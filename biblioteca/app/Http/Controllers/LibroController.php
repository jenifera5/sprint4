<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
   
    public function index()
    {
        // Cargar libros con sus categorías
        $libros = Libro::with('categorias')->get();
        return view('libros.index', compact('libros'));
    }

   
    public function create()
    {
        // Obtener todas las categorías para el selector
        $categorias = Categoria::all();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'anio' => 'required|digits:4|integer|min:1000|max:' . now()->year,
            'disponibles' => 'required|integer|min:0',
            'categorias' => 'required|array|min:1', // Al menos una categoría
            'categorias.*' => 'exists:categorias,id', // Validar que existan
        ], [
            'categorias.required' => 'Debes seleccionar al menos una categoría',
            'categorias.min' => 'Debes seleccionar al menos una categoría',
        ]);

        // Crear el libro
        $libro = Libro::create($request->only(['titulo', 'autor', 'anio', 'disponibles']));
        
        // Asociar las categorías seleccionadas
        $libro->categorias()->attach($request->categorias);

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente');
    }

    
    public function show(Libro $libro)
    {
        // Cargar el libro con sus categorías
        $libro->load('categorias');
        return view('libros.show', compact('libro'));
    }

   
    public function edit(Libro $libro)
    {
        // Cargar todas las categorías y el libro con sus categorías actuales
        $categorias = Categoria::all();
        $libro->load('categorias');
        return view('libros.edit', compact('libro', 'categorias'));
    }

 
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anio' => 'required|digits:4|integer|min:1000|max:' . now()->year,
            'disponibles' => 'required|integer|min:0',
            'categorias' => 'required|array|min:1',
            'categorias.*' => 'exists:categorias,id',
        ], [
            'categorias.required' => 'Debes seleccionar al menos una categoría',
            'categorias.min' => 'Debes seleccionar al menos una categoría',
        ]);
    
        // Actualizar datos del libro
        $libro->update($request->only(['titulo', 'autor', 'anio', 'disponibles']));
        
        // Sincronizar las categorías (elimina las viejas y agrega las nuevas)
        $libro->categorias()->sync($request->categorias);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente');
    }

    
    public function destroy(Libro $libro)
    {
        // Al eliminar el libro, las relaciones en la tabla pivote se eliminan automáticamente
        // gracias al onDelete('cascade') en la migración
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente');
    }
}






















