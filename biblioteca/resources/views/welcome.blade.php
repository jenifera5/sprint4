{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <!-- Hero section -->
    <section class="text-center mt-16 px-6">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">📚 Bienvenido/a a la Biblioteca Virtual</h2>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Explora libros, administra usuarios y gestiona préstamos fácilmente desde el sistema.
        </p>
    </section>

    <!-- Botones -->
    <div class="flex flex-wrap justify-center gap-5 mt-10 px-4">
        <a href="{{ route('libros.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-xl transition">
            Ver libros
        </a>
        <a href="{{ route('usuarios.index') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-xl transition">
            Ver usuarios
        </a>
        <a href="{{ route('prestamos.index') }}" class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-3 px-6 rounded-xl transition">
            Ver préstamos
        </a>
        <a href="{{ route('categorias.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-xl transition">
            Ver categorías
        </a>
    </div>

    <!-- Libros recomendados -->
    <section class="mt-10 text-center">
        <h3 class="text-2xl font-semibold text-gray-700 mb-4">📖 Libros recomendados</h3>
        <p class="text-sm text-gray-500 mb-6">Nuestras bibliotecas recomiendan estos títulos destacados.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('img/libro1.jpg') }}" alt="Libro 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-700">Carnaval</h2>
                    <p class="text-sm text-gray-500">Stephanie Garber</p>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('img/libro2.jpg') }}" alt="Libro 2" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-700">El duque y yo (Bridgerton 1) </h2>
                    <p class="text-sm text-gray-500">Julia Quinn</p>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('img/libro3.jpg') }}" alt="Libro 3" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-700">La asistenta</h2>
                    <p class="text-sm text-gray-500"> Freida McFadden</p>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('img/libro4.jpg') }}" alt="Libro 4" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-700">Powerless </h2>
                    <p class="text-sm text-gray-500"> Lauren Roberts</p>
                </div>
            </div>
        </div>
    </section>
@endsection

