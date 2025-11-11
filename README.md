# 📚 Sistema de Gestión de Biblioteca Virtual

Sistema web completo para la gestión de una biblioteca virtual, desarrollado con **Laravel 10** y **Blade**. Permite administrar libros, usuarios, préstamos y categorías de manera eficiente e intuitiva.

---

## 🌟 Características Principales

### ✅ Gestión Completa de Libros (CRUD)
- Crear, editar, visualizar y eliminar libros
- Asociar libros a múltiples categorías (relación N:M)
- Campos: título, autor, descripción, ISBN, copias disponibles
- Control de disponibilidad de copias

### ✅ Administración de Usuarios
- Registro y gestión de usuarios
- Validación de datos (email, contraseña, etc.)
- Historial completo de préstamos por usuario
- Visualización de préstamos activos y devueltos

### ✅ Sistema de Préstamos
- Crear y gestionar préstamos de libros
- Fechas de préstamo y devolución
- Control automático de disponibilidad de libros
- Marcar préstamos como devueltos
- Historial completo de préstamos

### ✅ Organización por Categorías
- Crear y gestionar categorías (géneros)
- Asignar múltiples categorías a cada libro
- Filtrado y organización del catálogo
- Estadísticas de categorías más prestadas

### ✅ Interfaz Moderna y Responsive
- Sidebar de navegación persistente
- Diseño adaptable a dispositivos móviles
- Iconos con Font Awesome
- Animaciones suaves con Tailwind CSS
- Experiencia de usuario optimizada

---

## 🛠️ Tecnologías Utilizadas

| Tecnología | Versión | Uso |
|-----------|---------|-----|
| **Laravel** | 10.x | Framework backend PHP |
| **Blade** | - | Motor de plantillas |
| **Eloquent ORM** | - | Mapeo objeto-relacional |
| **Tailwind CSS** | 3.x | Framework CSS utility-first |
| **MySQL / SQLite** | 8.x / 3.x | Base de datos |
| **Font Awesome** | 6.4 | Biblioteca de iconos |
| **PHP** | 8.1+ | Lenguaje backend |
| **Composer** | 2.x | Gestor de dependencias PHP |
| **Git** | - | Control de versiones |

---

## 📊 Modelo de Datos

### 🔗 Estructura de Tablas

#### 🧍‍♀️ **usuarios**
- `id` (PK)
- `nombre`
- `email` (único)
- `password`
- `created_at`, `updated_at`

#### 📚 **libros**
- `id` (PK)
- `titulo`
- `autor`
- `descripcion`
- `isbn` (único)
- `disponibles` (número de copias disponibles)
- `created_at`, `updated_at`

#### 🏷️ **categorias**
- `id` (PK)
- `nombre`
- `descripcion`
- `created_at`, `updated_at`

#### 🔗 **libro_categoria** (tabla pivote N:M)
- `id` (PK)
- `libro_id` (FK → libros)
- `categoria_id` (FK → categorias)

#### 🧾 **prestamos**
- `id` (PK)
- `usuario_id` (FK → usuarios)
- `libro_id` (FK → libros)
- `fecha_prestamo`
- `fecha_devolucion` (nullable)
- `devuelto` (boolean, default: false)
- `created_at`, `updated_at`

### 📋 Relaciones del Modelo

```php
// Libro → Categorías (N:M)
belongsToMany(Categoria::class, 'libro_categoria')

// Libro → Préstamos (1:N)
hasMany(Prestamo::class)

// Categoría → Libros (N:M)
belongsToMany(Libro::class, 'libro_categoria')

// Usuario → Préstamos (1:N)
hasMany(Prestamo::class)

// Préstamo → Usuario (N:1)
belongsTo(Usuario::class)

// Préstamo → Libro (N:1)
belongsTo(Libro::class)
```

### 📊 Consultas Útiles del Modelo

- ✅ **Qué libros ha pedido cada usuario** (con historial completo)
- ✅ **Si los préstamos están activos o fueron devueltos** (`devuelto` boolean)
- ✅ **Cuántas copias disponibles hay por libro** (campo `disponibles`)
- ✅ **Qué géneros/categorías tiene cada libro** (relación N:M)
- ✅ **Qué categorías son más prestadas** (mediante consultas Eloquent)

---

## 📋 Requisitos Previos

Antes de instalar el proyecto, asegúrate de tener:

- **PHP** >= 8.1
- **Composer** (gestor de dependencias de PHP)
- **MySQL** 8.x o **SQLite** 3.x
- **XAMPP** (opcional, para Apache + MySQL en local)
- **Git** (control de versiones)
- **Node.js y npm** (opcional, para compilar assets)

### Verificar Requisitos

```bash
# Verificar versión de PHP
php -v

# Verificar Composer
composer -v

# Verificar MySQL (si usas XAMPP)
mysql --version

# Verificar Git
git --version
```

---

## ⚙️ Instalación

### 1️⃣ Clonar el Repositorio

```bash
git clone https://github.com/jenifera5/sprint4.git
cd biblioteca
```

### 2️⃣ Instalar Dependencias de Composer

```bash
composer install
```

### 3️⃣ Configurar Archivo de Entorno

```bash
# Copiar archivo de ejemplo
cp .env.example .env
```

Edita el archivo `.env` y configura la base de datos:

#### Para MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca
DB_USERNAME=root
DB_PASSWORD=
```

#### Para SQLite (alternativa):

```env
DB_CONNECTION=sqlite
DB_DATABASE=/ruta/absoluta/database/database.sqlite
```

💡 **Importante:** Si usas XAMPP, asegúrate de tener Apache y MySQL encendidos, y crea la base de datos `biblioteca` en phpMyAdmin antes de continuar.

### 4️⃣ Generar Clave de Aplicación

```bash
php artisan key:generate
```

### 5️⃣ Crear Base de Datos (MySQL)

Si estás usando MySQL, crea la base de datos:

```sql
CREATE DATABASE biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

O crea el archivo SQLite:

```bash
touch database/database.sqlite
```

### 6️⃣ Ejecutar Migraciones

```bash
# Ejecutar todas las migraciones
php artisan migrate

# O limpiar todo y migrar de nuevo (¡cuidado, borra datos!)
php artisan migrate:fresh
```

### 7️⃣ Poblar la Base de Datos (Seeders)

```bash
# Ejecutar todos los seeders
php artisan db:seed

# O ejecutar uno específico
php artisan db:seed --class=UsuarioSeeder
php artisan db:seed --class=LibroSeeder
php artisan db:seed --class=CategoriaSeeder
php artisan db:seed --class=PrestamoSeeder
```

### 8️⃣ Restauración Completa (Migrar + Seeders)

Para dejar todo limpio y restaurar datos de ejemplo:

```bash
php artisan migrate:fresh --seed
```

✅ **Esto garantiza que:**
- Todas las tablas se eliminen y se creen desde cero
- Los seeders restauren usuarios, libros, categorías y préstamos
- El sistema quede listo para pruebas o demostraciones

### 9️⃣ Iniciar el Servidor de Desarrollo

```bash
php artisan serve
```

Visita: **http://127.0.0.1:8000** en tu navegador.

---

## 📁 Estructura del Proyecto

```
biblioteca/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── LibroController.php
│   │       ├── CategoriaController.php
│   │       ├── UsuarioController.php
│   │       └── PrestamoController.php
│   └── Models/
│       ├── Libro.php
│       ├── Categoria.php
│       ├── Usuario.php
│       └── Prestamo.php
├── database/
│   ├── migrations/
│   │   ├── xxxx_create_usuarios_table.php
│   │   ├── xxxx_create_libros_table.php
│   │   ├── xxxx_create_categorias_table.php
│   │   ├── xxxx_create_libro_categoria_table.php
│   │   └── xxxx_create_prestamos_table.php
│   └── seeders/
│       ├── UsuarioSeeder.php
│       ├── LibroSeeder.php
│       ├── CategoriaSeeder.php
│       └── PrestamoSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── partials/
│       │   └── navbar.blade.php
│       ├── libros/
│       ├── categorias/
│       ├── usuarios/
│       └── prestamos/
├── routes/
│   └── web.php
├── .env
├── .env.example
├── composer.json
└── README.md
```

---

## 🚀 Comandos Útiles de Laravel

### Generación de Modelos, Migraciones y Controladores

```bash
# Generar Modelo + Migración + Controlador de recursos + Seeder
php artisan make:model Usuario -mcrs
php artisan make:model Libro -mcrs
php artisan make:model Categoria -mcrs
php artisan make:model Prestamo -mcrs

# Generar solo migración para tabla pivote
php artisan make:migration create_libro_categoria_table
```

**Significado de las opciones:**
- `-m` → Crea la migración
- `-c` → Crea el controlador
- `-r` → Controlador de recursos (con métodos CRUD)
- `-s` → Crea el seeder

### Migraciones

```bash
# Ejecutar todas las migraciones pendientes
php artisan migrate

# Revertir la última migración
php artisan migrate:rollback

# Revertir todas las migraciones
php artisan migrate:reset

# Limpiar BD y migrar de nuevo (¡elimina todos los datos!)
php artisan migrate:fresh

# Migrar y ejecutar seeders
php artisan migrate:fresh --seed
```

### Seeders

```bash
# Ejecutar todos los seeders
php artisan db:seed

# Ejecutar un seeder específico
php artisan db:seed --class=LibroSeeder
```

### Cache y Optimización

```bash
# Limpiar caché de aplicación
php artisan cache:clear

# Limpiar caché de configuración
php artisan config:clear

# Limpiar caché de rutas
php artisan route:clear

# Limpiar caché de vistas
php artisan view:clear

# Optimizar aplicación para producción
php artisan optimize
```

### Rutas

```bash
# Ver todas las rutas registradas
php artisan route:list

# Filtrar rutas por nombre
php artisan route:list --name=libros
```

---

## 🧩 Rutas del Sistema

En `routes/web.php`:

```php
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;

// Rutas de recursos (CRUD completo)
Route::resource('libros', LibroController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('prestamos', PrestamoController::class);
```

### Rutas Generadas Automáticamente

| Método HTTP | URI | Acción | Ruta |
|------------|-----|--------|------|
| GET | /libros | index | libros.index |
| GET | /libros/create | create | libros.create |
| POST | /libros | store | libros.store |
| GET | /libros/{id} | show | libros.show |
| GET | /libros/{id}/edit | edit | libros.edit |
| PUT/PATCH | /libros/{id} | update | libros.update |
| DELETE | /libros/{id} | destroy | libros.destroy |

Lo mismo aplica para `categorias`, `usuarios` y `prestamos`.

---

## 🧠 Conceptos Clave de Laravel

### 📌 Eloquent ORM

Eloquent es el ORM (Object-Relational Mapper) de Laravel que permite trabajar con bases de datos usando objetos PHP en lugar de SQL.

**Ejemplo:**

```php
// Insertar un nuevo libro
$libro = new Libro();
$libro->titulo = 'El Quijote';
$libro->autor = 'Miguel de Cervantes';
$libro->save();

// Consultar todos los libros
$libros = Libro::all();

// Buscar por ID
$libro = Libro::find(1);

// Actualizar
$libro->titulo = 'Don Quijote de la Mancha';
$libro->save();

// Eliminar
$libro->delete();
```

### 📌 Directivas Blade

Blade es el motor de plantillas de Laravel que permite crear vistas reutilizables.

| Directiva | Descripción |
|-----------|-------------|
| `@extends('layouts.app')` | Hereda de una plantilla base |
| `@section('content')` | Define una sección de contenido |
| `@yield('content')` | Marca donde aparecerá el contenido |
| `@include('partials.navbar')` | Inserta un fragmento reutilizable |
| `@if`, `@else`, `@endif` | Condicionales |
| `@foreach`, `@endforeach` | Bucles |
| `@csrf` | Token de seguridad para formularios |

**Ejemplo de estructura:**

```blade
{{-- layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca</title>
</head>
<body>
    @include('partials.navbar')
    
    <main>
        @yield('content')
    </main>
</body>
</html>

{{-- libros/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h2>Listado de Libros</h2>
    @foreach($libros as $libro)
        <p>{{ $libro->titulo }}</p>
    @endforeach
@endsection
```

---

## 🎯 Manual de Uso

### 📚 Gestión de Libros

1. **Listar libros:** Ve a `/libros` para ver todos los libros disponibles
2. **Crear libro:** Haz clic en "Nuevo Libro" y completa el formulario
3. **Editar libro:** Haz clic en el botón "Editar" junto al libro deseado
4. **Eliminar libro:** Haz clic en "Eliminar" (solo si no tiene préstamos activos)
5. **Asignar categorías:** En el formulario de libro, selecciona una o más categorías

### 👥 Gestión de Usuarios

1. **Listar usuarios:** Ve a `/usuarios`
2. **Crear usuario:** Completa el formulario con nombre, email y contraseña
3. **Ver historial:** Haz clic en un usuario para ver sus préstamos

### 🏷️ Gestión de Categorías

1. **Listar categorías:** Ve a `/categorias`
2. **Crear categoría:** Añade nombre y descripción
3. **Ver libros por categoría:** Cada categoría muestra sus libros asociados

### 📋 Gestión de Préstamos

1. **Crear préstamo:**
   - Ve a `/prestamos/create`
   - Selecciona usuario y libro
   - El sistema verifica disponibilidad automáticamente
   - Se registra la fecha de préstamo

2. **Marcar como devuelto:**
   - Ve a la lista de préstamos
   - Haz clic en "Marcar como devuelto"
   - Se registra la fecha de devolución
   - Se incrementa el número de copias disponibles


---

## 🔒 Seguridad

- ✅ Validación de datos en todos los formularios
- ✅ Protección CSRF en formularios (`@csrf`)
- ✅ Hashing de contraseñas con Bcrypt
- ✅ Sanitización de entradas de usuario
- ✅ Prevención de inyección SQL (Eloquent ORM)

---

## 🐛 Solución de Problemas

### Error: "Base de datos no encontrada"
```bash
# Verifica que XAMPP esté corriendo
# Crea la base de datos en phpMyAdmin
# Verifica las credenciales en .env
```

### Error: "Class not found"
```bash
# Regenera el autoload de Composer
composer dump-autoload
```

### Error: "SQLSTATE[HY000]"
```bash
# Limpia la caché de configuración
php artisan config:clear
```

### Páginas en blanco o errores 500
```bash
# Activa el modo debug en .env
APP_DEBUG=true

# Revisa los logs
tail -f storage/logs/laravel.log
```

---

## 📝 Próximas Mejoras

- [ ] Sistema de autenticación con Laravel Breeze/Sanctum
- [ ] Panel de administración diferenciado
- [ ] Búsqueda avanzada de libros
- [ ] Exportación de reportes en PDF/Excel
- [ ] Notificaciones de devolución por email
- [ ] Sistema de reservas de libros
- [ ] API RESTful para aplicaciones móviles
- [ ] Integración con códigos de barras/QR

---

## 👨‍💻 Autor

**Tu Nombre**
- Email: jeniferalvarez12@gmail.com
- GitHub: [@jenifera5](https://github.com/jenifera5)

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

---

## 🙏 Agradecimientos

- [Laravel](https://laravel.com) - El framework PHP
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS
- [Font Awesome](https://fontawesome.com) - Iconos
- Comunidad de Laravel en español

---

## 📚 Recursos Adicionales

- [Documentación oficial de Laravel](https://laravel.com/docs)
- [Laravel en español](https://laravel-spanish.com)
- [Laracasts](https://laracasts.com) - Video tutoriales
- [Laravel Daily](https://laraveldaily.com) - Tips y trucos




