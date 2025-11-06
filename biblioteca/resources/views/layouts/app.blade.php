<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca Virtual')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animaciones suaves */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        /* Efecto hover en items del menú */
        .menu-item {
            transition: all 0.2s ease;
        }
        
        .menu-item:hover {
            transform: translateX(5px);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Overlay para móvil -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white shadow-2xl z-50 sidebar-transition transform -translate-x-full lg:translate-x-0">
        <!-- Logo y título -->
        <div class="flex items-center justify-between p-6 border-b border-blue-500">
            <div class="flex items-center gap-3">
                <i class="fas fa-book-open text-3xl"></i>
                <div>
                    <h1 class="text-xl font-bold">Biblioteca</h1>
                    <p class="text-xs text-blue-200">Virtual</p>
                </div>
            </div>
            <!-- Botón cerrar (solo móvil) -->
            <button id="close-sidebar" class="lg:hidden text-white hover:text-blue-200">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navegación -->
        <nav class="mt-6 px-4">
            <ul class="space-y-2">
                <!-- Inicio -->
                <li>
                    <a href="{{ url('/') }}" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 {{ request()->is('/') ? 'bg-blue-700 shadow-lg' : '' }}">
                        <i class="fas fa-home text-lg w-5"></i>
                        <span class="font-medium">Inicio</span>
                    </a>
                </li>

                <!-- Libros -->
                <li>
                    <a href="{{ route('libros.index') }}" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 {{ request()->is('libros*') ? 'bg-blue-700 shadow-lg' : '' }}">
                        <i class="fas fa-book text-lg w-5"></i>
                        <span class="font-medium">Libros</span>
                    </a>
                </li>

                <!-- Usuarios -->
                <li>
                    <a href="{{ route('usuarios.index') }}" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 {{ request()->is('usuarios*') ? 'bg-blue-700 shadow-lg' : '' }}">
                        <i class="fas fa-users text-lg w-5"></i>
                        <span class="font-medium">Usuarios</span>
                    </a>
                </li>

                <!-- Préstamos -->
                <li>
                    <a href="{{ route('prestamos.index') }}" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 {{ request()->is('prestamos*') ? 'bg-blue-700 shadow-lg' : '' }}">
                        <i class="fas fa-handshake text-lg w-5"></i>
                        <span class="font-medium">Préstamos</span>
                    </a>
                </li>

                <!-- Categorías -->
                <li>
                    <a href="{{ route('categorias.index') }}" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-700 {{ request()->is('categorias*') ? 'bg-blue-700 shadow-lg' : '' }}">
                        <i class="fas fa-tags text-lg w-5"></i>
                        <span class="font-medium">Categorías</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Footer del sidebar -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-500">
            <div class="flex items-center gap-3 px-2">
                <i class="fas fa-user-circle text-2xl"></i>
                <div class="text-sm">
                    <p class="font-semibold">Visitante</p>
                    <p class="text-xs text-blue-200">Administrador</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Contenido principal -->
    <div class="lg:ml-64 min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-md sticky top-0 z-30">
            <div class="flex items-center justify-between px-4 py-4">
                <!-- Botón menú (solo móvil) -->
                <button id="open-sidebar" class="lg:hidden text-gray-700 hover:text-blue-600 text-2xl">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Título de página -->
                <h2 class="text-xl font-semibold text-gray-800">
                    @yield('page-title', 'Inicio')
                </h2>

                <!-- Espacio para futuras opciones -->
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500 hidden sm:block">
                        {{ date('d/m/Y') }}
                    </span>
                </div>
            </div>
        </header>

        <!-- Contenido dinámico -->
        <main class="flex-grow p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow-inner mt-auto text-center text-gray-500 text-sm py-4">
            &copy; {{ date('Y') }} Biblioteca Virtual. Todos los derechos reservados.
        </footer>
    </div>

    <!-- JavaScript para el sidebar móvil -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const openBtn = document.getElementById('open-sidebar');
        const closeBtn = document.getElementById('close-sidebar');

        // Abrir sidebar
        openBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });

        // Cerrar sidebar
        const closeSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        };

        closeBtn.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // Cerrar al cambiar de tamaño a escritorio
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                overlay.classList.add('hidden');
            }
        });
    </script>

</body>
</html>