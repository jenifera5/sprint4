@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Nuevo Préstamo</h1>

    <form action="{{ route('prestamos.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="id_usuario" class="block font-semibold">Usuario:</label>
            <select name="id_usuario" id="id_usuario" class="border p-2 w-full rounded">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="id_libro" class="block font-semibold">Libro:</label>
            <select name="id_libro" id="id_libro" class="border p-2 w-full rounded">
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="fecha_prestamo" class="block font-semibold">Fecha de préstamo:</label>
            <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="border p-2 w-full rounded">
        </div>

        <div>
            <label for="fecha_devolucion" class="block font-semibold">Fecha de devolución:</label>
            <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="border p-2 w-full rounded">
        </div>

        <div>
            <label for="estado" class="block font-semibold">Estado:</label>
            <select name="estado" id="estado" class="border p-2 w-full rounded">
                <option value="activo">Activo</option>
                <option value="devuelto">Devuelto</option>
                <option value="atrasado">Atrasado</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar préstamo</button>
    </form>
</div>
@endsection

