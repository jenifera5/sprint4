@extends('layouts.app')

@section('title', 'Libros')

@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">📖Lista de Libros</h1>

        <a href="{{ route('libros.create') }}"
           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
             ➕ Nuevo libro
        </a>
    </div>

    {{-- Flash de éxito --}}
    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-50 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded">
            <thead class="bg-gray-50 text-left text-sm text-gray-600">
                <tr>
                    <th class="px-4 py-3 border-b">ID</th>
                    <th class="px-4 py-3 border-b">Título</th>
                    <th class="px-4 py-3 border-b">Autor</th>
                    <th class="px-4 py-3 border-b">Año</th>
                    <th class="px-4 py-3 border-b">Disponibles</th>
                    <th class="px-4 py-3 border-b text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @forelse ($libros as $libro)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $libro->id }}</td>
                        <td class="px-4 py-3 border-b">{{ $libro->titulo }}</td>
                        <td class="px-4 py-3 border-b">{{ $libro->autor }}</td>
                        <td class="px-4 py-3 border-b">{{ $libro->anio }}</td>
                        <td class="px-4 py-3 border-b">
                            <span class="inline-block px-2 py-0.5 rounded text-xs
                                {{ $libro->disponibles > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $libro->disponibles }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border-b">
                            <div class="flex items-center gap-2 justify-end">
                                <a href="{{ route('libros.show', $libro) }}"
                                   class="px-3 py-1 rounded border text-gray-700 hover:bg-gray-100">👁Ver</a>

                                <a href="{{ route('libros.edit', $libro) }}"
                                   class="px-3 py-1 rounded bg-yellow-500 hover:bg-yellow-600 text-white">✏️Editar</a>

                                <form action="{{ route('libros.destroy', $libro) }}" method="POST"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este libro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 rounded bg-red-600 hover:bg-red-700 text-white">
                                        🗑️Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            No hay libros registrados aún.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación (opcional) --}}
    @isset($libros) 
        @if(method_exists($libros, 'links'))
            <div class="mt-4">
                {{ $libros->links() }}
            </div>
        @endif
    @endisset
</div>
@endsection

