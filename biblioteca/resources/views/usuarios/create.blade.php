@extends('layouts.app')
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Crear Usuario</h1>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Nombre:</label>
            <input type="text" name="nombre" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Email:</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Contraseña:</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
    </form>
</div>
@endsection

