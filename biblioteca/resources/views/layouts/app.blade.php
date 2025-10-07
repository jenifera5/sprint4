<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca Virtual')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 bg-white shadow-md">
        <div class="flex items-center gap-3">
            <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png" alt="Logo" class="h-10 w-10">
            <h1 class="text-2xl font-semibold text-gray-800">Biblioteca Virtual </h1>
        </div>
        <div class="text-sm text-gray-500">
            Bienvenido/a, visitante
        </div>
    </header>

    <!-- Contenido dinámico -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer común -->
    <footer class="bg-white shadow-inner mt-10 text-center text-gray-400 text-sm py-6">
        &copy; {{ date('Y') }} Biblioteca Virtual. Todos los derechos reservados.
    </footer>

</body>
</html>
