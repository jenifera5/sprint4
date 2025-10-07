@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Préstamos</h1>
        <a href="{{ route('prestamos.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">Nuevo préstamo</a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de préstamos --}}
    @if ($prestamos->count())
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Usuario</th>
                    <th class="border p-2">Libro</th>
                    <th class="border p-2">F. préstamo</th>
                    <th class="border p-2">F. devolución</th>
                    <th class="border p-2">Estado</th>
                    <th class="border p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    @if(!empty($prestamo->id))
                        <tr>
                            <td class="border p-2">{{ $prestamo->id }}</td>
                            <td class="border p-2">{{ $prestamo->usuario->nombre ?? 'Sin usuario' }}</td>
                            <td class="border p-2">{{ $prestamo->libro->titulo ?? 'Sin libro' }}</td>
                            <td class="border p-2">{{ $prestamo->fecha_prestamo }}</td>
                            <td class="border p-2">{{ $prestamo->fecha_devolucion ?? '—' }}</td>
                            <td class="border p-2">{{ $prestamo->estado }}</td>
                            <td class="border p-2 space-x-2">
                                {{-- Botón Ver --}}
                                <a href="{{ route('prestamos.show', ['prestamo' => $prestamo->id]) }}" 
                                   class="text-blue-600 hover:underline">Ver</a>

                                {{-- Botón Editar --}}
                                <a href="{{ route('prestamos.edit', ['prestamo' => $prestamo->id]) }}" 
                                   class="text-yellow-600 hover:underline">Editar</a>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('prestamos.destroy', ['prestamo' => $prestamo->id]) }}" 
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:underline"
                                            onclick="return confirm('¿Seguro que deseas eliminar este préstamo?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-4 text-gray-600">No hay préstamos registrados.</p>
    @endif
</div>
@endsection



