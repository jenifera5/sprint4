@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Crear Categoría</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-bold">Nombre:</label>
            <input type="text" name="nombre" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Descripción:</label>
            <textarea name="descripcion" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection
