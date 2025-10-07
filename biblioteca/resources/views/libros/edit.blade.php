@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar libro</h1>

    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Título</label>
            <input type="text" name="titulo" value="{{ old('titulo', $libro->titulo) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Autor</label>
            <input type="text" name="autor" value="{{ old('autor', $libro->autor) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Año</label>
            <input type="number" name="anio" value="{{ old('anio', $libro->anio) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Disponibles</label>
            <input type="number" name="disponibles" value="{{ old('disponibles', $libro->disponibles) }}" min="0" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</div>
@endsection
