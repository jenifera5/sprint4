@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $categoria->nombre }}</h1>
    <p class="text-gray-600 mb-6">{{ $categoria->descripcion }}</p>

    <h2 class="text-xl font-semibold mb-3">Libros en esta categoría:</h2>
    
    @if($libros->isEmpty())
        <p class="text-gray-500">No hay libros en esta categoría.</p>
    @else
        <ul class="space-y-2">
            @foreach($libros as $libro)
                <li class="border p-3 rounded bg-gray-50">
                    <strong>{{ $libro->titulo }}</strong> — {{ $libro->autor }} ({{ $libro->anio }})
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('categorias.index') }}" class="mt-6 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
</div>
@endsection
