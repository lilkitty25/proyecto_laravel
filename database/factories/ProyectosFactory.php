<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectosFactory extends Factory
{
    /**
     * Definir el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $proyectos = [
                "Gestión de Inventarios Empresariales",
                "Control de Asistencia Escolar en Tiempo Real",
                "Sistema de Reservas en Línea para Restaurantes",
                "Gestión de Bibliotecas Digitales",
                "Seguimiento y Gestión de Proyectos de Construcción",
                "Aplicación de Gestión de Citas Médicas",
                "Sistema de Control de Stock de Tienda en Línea",
                "Gestión de Recetas y Planes de Alimentación",
                "Control de Facturación y Pagos de Clientes",
                "Gestión Automática de Pedidos para Tienda de Ropa",
                "Base de Datos de Clientes para Agencia de Viajes",
                "Sistema de Inscripción y Registro de Cursos en Línea",
                "Gestión de Recursos Humanos y Nómina",
                "Automatización de Gestión de Tareas de Oficina",
                "Control de Inventarios para Comercio Electrónico",
                "Gestión de Reservas y Disponibilidad de Hoteles",
        ];
        return [
            'nombre' => $proyectos[rand(0,sizeof($proyectos))], // Relación con el modelo Usuario, generando un ID aleatorio de usuario
        ];
    }
}
