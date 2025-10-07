@extends('layouts.app')


@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">✏️ Editar usuario</h2>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="space-y-5 bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" class="input" value="{{ old('nombre', $usuario->nombre) }}" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="input" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
            Actualizar usuario
        </button>
    </form>
</div>
@endsection
