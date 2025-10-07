@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-6 bg-white shadow p-6 rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Detalles del préstamo</h1>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <p class="font-semibold">📘 Libro:</p>
            <p>{{ $prestamo->libro->titulo ?? 'Sin libro asignado' }}</p>
        </div>

        <div>
            <p class="font-semibold">👤 Usuario:</p>
            <p>{{ $prestamo->usuario->nombre ?? 'Sin usuario asignado' }}</p>
        </div>

        <div>
            <p class="font-semibold">📅 Fecha de préstamo:</p>
            <p>{{ $prestamo->fecha_prestamo }}</p>
        </div>

        <div>
            <p class="font-semibold">📆 Fecha de devolución:</p>
            <p>{{ $prestamo->fecha_devolucion ?? 'Pendiente' }}</p>
        </div>

        <div class="col-span-2">
            <p class="font-semibold">📖 Estado:</p>
            <p>{{ ucfirst($prestamo->estado) }}</p>
        </div>
    </div>

    <div class="mt-6 flex gap-4">
        <a href="{{ route('prestamos.index') }}" 
           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>

        <a href="{{ route('prestamos.edit', $prestamo->id) }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Editar</a>

        <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este préstamo?')">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection
