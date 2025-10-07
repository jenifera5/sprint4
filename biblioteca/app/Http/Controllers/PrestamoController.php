<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('usuario', 'libro')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $libros = Libro::all();
        return view('prestamos.create', compact('usuarios', 'libros'));
    }

    public function store(Request $request)
    {
            $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_libro' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo',
            'estado' => 'required|string|max:20',
        ]);

        $prestamo = Prestamo::create($request->all());

  
        return redirect()
        ->route('prestamos.show', ['prestamo' => $prestamo->id])
        ->with('success', 'Préstamo creado correctamente');
    }


    public function show(Prestamo $prestamo)
    {
        // cargamos usuario y libro asociados
        $prestamo->load('usuario', 'libro');

        return view('prestamos.show', compact('prestamo'));
    }

    public function edit(Prestamo $prestamo)
    {
        $prestamo->load('usuario', 'libro');
        $usuarios = Usuario::all();
        $libros = Libro::all();

        return view('prestamos.edit', compact('prestamo', 'usuarios', 'libros'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_libro' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo',
            'estado' => 'required|string|max:20',
        ]);

        $prestamo->update($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente');
    }

    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente');
    }
}
