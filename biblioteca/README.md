Readme · MD
Copiar

# 🧪 FullStack Sprint 4 – Laravel MVC

Este repositorio contiene los ejercicios desarrollados durante el **Sprint 4** del curso de **Desarrollo Web FullStack** en **IT Academy**.  
Durante este Sprint se trabaja con el framework **Laravel** aplicando el patrón de diseño **MVC**, junto con herramientas modernas como **Eloquent, Livewire, Tailwind CSS** y más.

---

## 📚 Proyecto Principal: Sistema de Gestión de Biblioteca Virtual

Sistema web para la gestión de una biblioteca virtual, desarrollado con Laravel y Blade. Permite administrar libros, usuarios, préstamos y categorías de manera eficiente.

### 🚀 Características del Proyecto

- ✅ Gestión completa de libros (CRUD)
- ✅ Administración de usuarios
- ✅ Sistema de préstamos
- ✅ Organización por categorías
- ✅ Interfaz moderna y responsive
- ✅ Sidebar de navegación persistente
- ✅ Diseño adaptable a dispositivos móviles

### 🛠️ Tecnologías Utilizadas

- **Backend:** Laravel 10.x
- **Frontend:** Blade Templates
- **Estilos:** Tailwind CSS
- **Base de datos:** SQLite
- **Iconos:** Font Awesome 6
- **Control de versiones:** Git con Gitflow

### 📖 Documentación del Proyecto

Para más información sobre instalación, uso y características del sistema de biblioteca, consulta el archivo **[README_BIBLIOTECA.md](./biblioteca/README_BIBLIOTECA.md)** dentro de la carpeta del proyecto.

---

## 📑 Tabla de Contenidos del Sprint

1. [Tema 1 – Entorno de desarrollo](#tema-1--entorno-de-desarrollo)
2. [Tema 2 – Empezando con Laravel](#tema-2--empezando-con-laravel)
3. [Tema 3 – Views](#tema-3--views)
4. [Tema 4 – Formularios y validación](#tema-4--formularios-y-validación)
5. [Tema 5 – Bases de datos](#tema-5--bases-de-datos)
6. [Tema 6 – Autenticación en Laravel](#tema-6--autenticación-en-laravel)
7. [Tema 7 – Emails](#tema-7--emails)
8. [Tema 8 – Livewire](#tema-8--livewire)
9. [Tema 9 – Capa de Servicio](#tema-9--capa-de-servicio)
10. [Tema 10 – Próximos pasos](#tema-10--próximos-pasos)
11. [Requisitos](#requisitos)

---

## 🛠 Tema 1 – Entorno de desarrollo

**Objetivo:**
- Configurar correctamente el entorno para desarrollar con Laravel.

**Método:**
- Instalar Composer, Laravel, PHP y Node.
- Configurar un proyecto nuevo con `composer create-project`.
- Levantar el servidor con `php artisan serve`.

**Aplicado en el proyecto:**
- ✅ Entorno configurado con Laravel 10.x
- ✅ Base de datos SQLite configurada
- ✅ Servidor de desarrollo funcional

---

## 🚀 Tema 2 – Empezando con Laravel

**Objetivo:**
- Comprender la estructura base de Laravel y cómo funciona MVC.

**Método:**
- Explorar carpetas clave como `routes`, `resources`, `app`, `config`.
- Crear rutas, controladores y vistas simples.

**Aplicado en el proyecto:**
- ✅ Estructura MVC implementada
- ✅ 4 controladores principales (Libro, Usuario, Préstamo, Categoría)
- ✅ Sistema de rutas resource organizado

---

## 🖼 Tema 3 – Views

**Objetivo:**
- Trabajar con el motor de plantillas Blade.

**Método:**
- Crear archivos `.blade.php`.
- Utilizar directivas como `@extends`, `@include`, `@section`, `@yield`.

**Aplicado en el proyecto:**
- ✅ Layout principal con `@extends` y `@yield`
- ✅ Componentes reutilizables (sidebar)
- ✅ Vistas organizadas por módulos
- ✅ Diseño responsive con Tailwind CSS

---

## 📄 Tema 4 – Formularios y validación

**Objetivo:**
- Crear formularios y validar datos del usuario.

**Método:**
- Usar `@csrf`, métodos `POST` y `GET`.
- Validar entradas con `Request` y reglas (`required`, `email`, etc.).

**Aplicado en el proyecto:**
- ✅ Formularios CRUD para todas las entidades
- ✅ Validación de datos implementada
- ✅ Protección CSRF en todos los formularios
- ✅ Mensajes de error personalizados

---

## 🗃 Tema 5 – Bases de datos

**Objetivo:**
- Trabajar con bases de datos utilizando Eloquent ORM.

**Método:**
- Crear migraciones, modelos y relaciones (`hasMany`, `belongsTo`, etc.).
- Insertar, leer, actualizar y eliminar datos desde el modelo.

**Aplicado en el proyecto:**
- ✅ Modelos Eloquent: Libro, Usuario, Préstamo, Categoría
- ✅ Relaciones implementadas:
  - Libro `belongsTo` Categoría
  - Categoría `hasMany` Libros
  - Préstamo `belongsTo` Libro y Usuario
- ✅ Migraciones con integridad referencial
- ✅ Operaciones CRUD completas

---

## 🔐 Tema 6 – Autenticación en Laravel

**Objetivo:**
- Implementar autenticación de usuarios/as.

**Método:**
- Usar Laravel Breeze o Fortify.
- Proteger rutas con middleware `auth`.
- Redirigir según el estado de autenticación.

**Estado en el proyecto:**
- 🔄 Pendiente de implementación (mejora futura)

---

## ✉️ Tema 7 – Emails

**Objetivo:**
- Enviar correos desde la aplicación Laravel.

**Método:**
- Configurar un proveedor SMTP.
- Usar `Mail::to()` y clases `Mailable`.

**Estado en el proyecto:**
- 🔄 Pendiente de implementación (mejora futura)

---

## ⚡ Tema 8 – Livewire

**Objetivo:**
- Crear componentes dinámicos sin usar JavaScript.

**Método:**
- Instalar Livewire en el proyecto.
- Crear componentes con `php artisan make:livewire`.
- Usar `wire:model`, `wire:click`, etc.

**Estado en el proyecto:**
- 🔄 Pendiente de implementación (mejora futura)

---

## 🧠 Tema 9 – Capa de Servicio

**Objetivo:**
- Aplicar el principio de separación de responsabilidades.

**Método:**
- Crear servicios en `app/Services`.
- Mover lógica de negocio fuera de los controladores.

**Estado en el proyecto:**
- 🔄 Pendiente de refactorización

---

## 📌 Tema 10 – Próximos pasos

**Objetivo:**
- Consolidar conocimientos y preparar el proyecto final.

**Método:**
- Repasar estructura MVC.
- Mejorar prácticas de control de versiones (Git/GitHub).
- Integrar Laravel con Tailwind y herramientas modernas.

**Aplicado en el proyecto:**
- ✅ Estructura MVC consolidada
- ✅ Gitflow implementado (main, develop, feature branches)
- ✅ Integración con Tailwind CSS
- ✅ Diseño moderno y profesional

---

## 🧰 Requisitos

- Tener instalado:
  - **PHP 8.1 o superior**
  - **Composer**
  - **Laravel CLI**
  - **Visual Studio Code** (o IDE preferido)
  - **SQLite3**
  - **Node.js y npm**
  - **Git**

---

## 📁 Estructura del Repositorio

```
SPRINT4/
├── biblioteca/              # Proyecto principal de biblioteca
│   ├── app/
│   │   ├── Http/
│   │   │   └── Controllers/
│   │   └── Models/
│   ├── database/
│   ├── resources/
│   │   └── views/
│   ├── routes/
│   └── README_BIBLIOTECA.md
├── otros-ejercicios/        # Ejercicios adicionales del Sprint
└── README.md               # Este archivo
```

---

## 🚀 Inicio Rápido

### Clonar el repositorio

```bash
git clone [URL_DEL_REPOSITORIO]
cd SPRINT4/biblioteca
```

### Instalar dependencias

```bash
composer install
```

### Configurar el proyecto

```bash
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
```

### Iniciar el servidor

```bash
php artisan serve
```

Visita: `http://localhost:8000`

---

## 🔄 Flujo de Trabajo con Gitflow

Este proyecto utiliza **Gitflow** como estrategia de ramificación:

### Ramas Principales

- `main`: Código en producción
- `develop`: Rama de desarrollo principal

### Ramas de Soporte

- `feature/*`: Nuevas características
- `hotfix/*`: Correcciones urgentes
- `release/*`: Preparación de releases

### Ejemplo de Workflow

```bash
# Crear nueva característica
git checkout develop
git checkout -b feature/nueva-funcionalidad

# Desarrollar y hacer commits
git add .
git commit -m "feat: descripción de la característica"

# Finalizar característica
git checkout develop
git merge feature/nueva-funcionalidad
git branch -d feature/nueva-funcionalidad
```

---

## 📈 Progreso del Sprint

| Tema | Estado | Notas |
|------|--------|-------|
| Tema 1 - Entorno | ✅ Completado | Configuración exitosa |
| Tema 2 - Laravel Básico | ✅ Completado | MVC implementado |
| Tema 3 - Views | ✅ Completado | Blade + Tailwind |
| Tema 4 - Formularios | ✅ Completado | Validación implementada |
| Tema 5 - BD | ✅ Completado | Eloquent + Relaciones |
| Tema 6 - Autenticación | 🔄 Pendiente | Mejora futura |
| Tema 7 - Emails | 🔄 Pendiente | Mejora futura |
| Tema 8 - Livewire | 🔄 Pendiente | Mejora futura |
| Tema 9 - Servicios | 🔄 En progreso | Refactorización |
| Tema 10 - Consolidación | ✅ Completado | Git + Diseño |

---

## 🎯 Mejoras Implementadas

### ✅ Completadas

- Sidebar de navegación responsive
- Diseño moderno con Tailwind CSS
- Estructura Gitflow implementada
- README completo con documentación
- Sistema CRUD funcional para todas las entidades

### 🔄 En Progreso

- Refactorización de validaciones
- Capa de servicios
- Mejora de integridad referencial
- Traducción de código a inglés

### 📋 Pendientes

- Sistema de autenticación
- Envío de emails
- Componentes Livewire
- Dashboard con estadísticas en tiempo real
- Sistema de búsqueda avanzada

---

## 🐛 Solución de Problemas Comunes

### Error: "Could not find driver"

Asegúrate de tener la extensión SQLite habilitada en `php.ini`:

```ini
extension=pdo_sqlite
extension=sqlite3
```

### Error de permisos

En Linux/Mac:

```bash
chmod -R 775 storage bootstrap/cache
```

### Limpiar caché

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

## 📚 Recursos Útiles

- [Documentación oficial de Laravel](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Blade Templates](https://laravel.com/docs/blade)
- [Gitflow Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow)

---

## 👥 Contribución

Este es un proyecto educativo del Sprint 4 de IT Academy. Las contribuciones son bienvenidas siguiendo las mejores prácticas de Gitflow.

---

## 📄 Licencia

Este proyecto es de código abierto y está disponible bajo la licencia MIT.

---

✍️ **Autor/a:** Jenifer Álvarez  
📅 **Sprint 4 – Curso FullStack – IT Academy**  
🏫 **IT Academy - Barcelona Activa**

---
