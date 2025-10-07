@extends('layouts.app')


@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">👥 Lista de usuarios</h2>

    <a href="{{ route('usuarios.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">
        ➕ Añadir usuario
    </a>

    <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-md">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $usuario->nombre }}</td>
                    <td class="px-4 py-2">{{ $usuario->email }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="text-yellow-500 hover:underline">✏️ Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
