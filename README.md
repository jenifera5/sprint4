# 📚 Sistema de Gestión de Biblioteca Virtual

Sistema web para la gestión de una biblioteca virtual, desarrollado con Laravel y Blade. Permite administrar libros, usuarios, préstamos y categorías de manera eficiente e intuitiva.

---

## 🚀 Características

- ✅ **Gestión completa de libros (CRUD)**
  - Crear, editar, visualizar y eliminar libros
  - Asociar libros a categorías
  - Campos: título, autor, descripción, ISBN, categoría
  
- ✅ **Administración de usuarios**
  - Registro y gestión de usuarios
  - Validación de datos (email, contraseña, etc.)
  - Historial de préstamos por usuario

- ✅ **Sistema de préstamos**
  - Crear y gestionar préstamos
  - Fechas de préstamo y devolución
  - Control de libros disponibles
  - Marcar préstamos como devueltos

- ✅ **Organización por categorías**
  - Crear y gestionar categorías
  - Asignar múltiples libros a cada categoría
  - Organización del catálogo

- ✅ **Interfaz moderna y responsive**
  - Sidebar de navegación persistente
  - Diseño adaptable a dispositivos móviles
  - Experiencia de usuario optimizada
  - Animaciones suaves

---

## 🛠️ Tecnologías Utilizadas

| Tecnología | Versión | Uso |
|-----------|---------|-----|
| **Laravel** | 10.x | Framework backend |
| **Blade** | - | Motor de plantillas |
| **Tailwind CSS** | 3.x | Framework CSS |
| **SQLite** | 3.x | Base de datos |
| **Font Awesome** | 6.4 | Iconos |
| **PHP** | 8.1+ | Lenguaje backend |
| **Git** | - | Control de versiones |

---

## 📋 Requisitos Previos

Antes de instalar el proyecto, asegúrate de tener instalado:

- **PHP** >= 8.1
- **Composer** (gestor de dependencias de PHP)
- **SQLite3** (base de datos)
- **Git** (control de versiones)
- **Node.js y npm** (opcional, para compilar assets)

### Verificar requisitos

```bash
# Verificar versión de PHP
php -v

# Verificar Composer
composer --version

# Verificar SQLite
sqlite3 --version

# Verificar Git
git --version
```

---

## ⚙️ Instalación

### 1️⃣ Clonar el repositorio

```bash
git clone [URL_DE_TU_REPOSITORIO]
cd biblioteca
```

### 2️⃣ Instalar dependencias de Composer

```bash
composer install
```

### 3️⃣ Configurar archivo de entorno

```bash
# Copiar archivo de ejemplo
cp .env.example .env
```

Edita el archivo `.env` y configura la base de datos:

```env