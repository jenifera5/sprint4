@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Préstamo</h1>

    <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Usuario -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Usuario:</label>
            <select name="id_usuario" class="w-full border rounded px-3 py-2">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" 
                        {{ $prestamo->id_usuario == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Libro -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Libro:</label>
            <select name="id_libro" class="w-full border rounded px-3 py-2">
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}" 
                        {{ $prestamo->id_libro == $libro->id ? 'selected' : '' }}>
                        {{ $libro->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Fecha préstamo -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Fecha de Préstamo:</label>
            <input type="date" name="fecha_prestamo" value="{{ $prestamo->fecha_prestamo }}" 
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Fecha devolución -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Fecha de Devolución:</label>
            <input type="date" name="fecha_devolucion" value="{{ $prestamo->fecha_devolucion }}" 
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Estado -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Estado:</label>
            <select name="estado" class="w-full border rounded px-3 py-2">
                <option value="activo" {{ $prestamo->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="devuelto" {{ $prestamo->estado == 'devuelto' ? 'selected' : '' }}>Devuelto</option>
                <option value="retrasado" {{ $prestamo->estado == 'retrasado' ? 'selected' : '' }}>Retrasado</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Guardar Cambios
        </button>
    </form>
</div>
@endsection
