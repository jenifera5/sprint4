@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $libro->titulo }}</h1>

    {{-- Portada del libro según ID --}}
    @php
        $imagen = 'img/libros/libro' . $libro->id . '.png';
    @endphp
    <img src="{{ asset($imagen) }}" 
         alt="Portada de {{ $libro->titulo }}" 
         class="w-48 h-64 object-cover rounded shadow mb-4 mx-auto">

    <p><strong>Autor:</strong> {{ $libro->autor }}</p>
    <p><strong>Año:</strong> {{ $libro->anio }}</p>
    <p><strong>Disponibles:</strong> {{ $libro->disponibles }}</p>

    <div class="mt-6 flex space-x-4">
        <a href="{{ route('libros.index') }}" 
           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>

        <a href="{{ route('libros.edit', $libro->id) }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Editar</a>

        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este libro?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection

