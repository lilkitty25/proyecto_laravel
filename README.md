# Sistema de Gestión de Estudiantes

Sistema web desarrollado con Laravel para la gestión de estudiantes y sus competencias lingüísticas.

## Características Principales

- **Gestión de Estudiantes**
  - Registro de datos personales (nombre, email, DNI)
  - Listado y búsqueda de estudiantes
  - Edición y eliminación de registros

- **Gestión de Idiomas**
  - Registro de múltiples idiomas por estudiante
  - Niveles de competencia (A1-C2)
  - Registro de títulos y certificaciones

- **Interfaz de Usuario**
  - Diseño moderno con gradientes y efectos visuales
  - Formularios interactivos y validación en tiempo real
  - Interfaz responsiva adaptada a diferentes dispositivos

## Tecnologías Utilizadas

- Laravel (Framework PHP)
- Tailwind CSS
- MySQL
- Blade Templates
- DaisyUI (Plugin de Tailwind CSS)
- Laravel Breeze (Autenticación)

## Requisitos

- PHP >= 8.0
- Composer
- Node.js y NPM
- MySQL

## Instalación y Configuración

1. **Clonar el Repositorio**
   ```bash
   git clone <url-del-repositorio>
   cd proyecto_laravel
   ```

2. **Instalar Dependencias**
   ```bash
   composer install
   npm install
   ```

3. **Instalar DaisyUI y Breeze**
   ```bash
   npm install -D daisyui@latest
   composer require laravel/breeze --dev
   php artisan breeze:install
   ```

4. **Configurar el Entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar la Base de Datos**
   - Crear base de datos en MySQL
   - Actualizar credenciales en el archivo `.env`
   - Ejecutar migraciones:
     ```bash
     php artisan migrate --seed
     ```

6. **Compilar Assets**
   ```bash
   npm run dev
   ```

7. **Iniciar el Servidor**
   ```bash
   php artisan serve
   ```

## Estructura del Proyecto

- **Components**
  - Layout principal con header, main, footer y nav
  - Componentes reutilizables para formularios
  - Menú de navegación responsive
  - Botón hamburguesa sin JavaScript para menú móvil

- **Vistas (resources/views)**
  - Layouts base con Blade
  - Secciones modulares para alumnos
  - Formularios de creación y edición
  - Páginas de listado y detalles
  - Header con formulario de login/register
  - Directivas de autenticación (@auth, @guest)

- **Controladores**
  - AlumnoController para la lógica de negocio
  - Validación de datos con Form Requests
  - Gestión de relaciones con idiomas
  - Controladores generados con artisan (make:controller)

- **Base de Datos**
  - Migraciones para estructura de tablas
  - Seeders para datos de prueba
  - Relaciones entre alumnos e idiomas

## Características de Autenticación

- Sistema completo de login y registro con Breeze
- Protección de rutas para usuarios autenticados
- Botón de logout con método POST
- Directivas Blade para control de acceso (@auth, @guest)
- Gestión de sesiones de usuario

## Características de UI/UX

- Tema Valentine de DaisyUI implementado
- Menú responsive con botón hamburguesa sin JavaScript
- Formularios estilizados con Tailwind CSS
- Mensajes de error y éxito
- Gradientes y efectos visuales modernos
- Componentes reutilizables

## Rutas y Navegación

- Rutas protegidas para usuarios autenticados
- Ruta de logout con método POST
- Sistema de navegación responsive
- Enlaces dinámicos basados en el estado de autenticación
