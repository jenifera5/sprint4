@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">✍🏻Lista de Categorías</h1>

    <a href="{{ route('categorias.create') }}" 
       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">
       ➕ Nueva Categoría
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">ID</th>
                <th class="border p-2">Nombre</th>
                <th class="border p-2">Descripción</th>
                <th class="border p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td class="border p-2">{{ $categoria->id }}</td>
                <td class="border p-2">{{ $categoria->nombre }}</td>
                <td class="border p-2">{{ $categoria->descripcion }}</td>
                <td class="border p-2 flex space-x-2">
                    <!-- Botón Ver -->
                    <a href="{{ route('categorias.show', $categoria->id) }}" 
                       class="bg-gray-500 text-white px-2 py-1 rounded hover:bg-gray-600">👁 
                       Ver</a>

                    <a href="{{ route('categorias.edit', $categoria->id) }}" 
                       class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">✏️Editar</a>

                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" 
                          onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                        🗑️Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
