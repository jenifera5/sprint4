@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Añadir libro</h1>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Título</label>
            <input type="text" name="titulo" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Autor</label>
            <input type="text" name="autor" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Año</label>
            <input type="number" name="anio" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Disponibles</label>
            <input type="number" name="disponibles" min="0" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection

