@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold">Nombre:</label>
            <input type="text" name="nombre" value="{{ $categoria->nombre }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Descripción:</label>
            <textarea name="descripcion" class="w-full border px-3 py-2 rounded">{{ $categoria->descripcion }}</textarea>
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Actualizar</button>
    </form>
</div>
@endsection
