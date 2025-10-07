<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestamo;

class PrestamoSeeder extends Seeder
{
    public function run(): void
    {
        Prestamo::create([
            'id_usuario' => 1, // María
            'id_libro' => 1,   // Alas de sangre
            'fecha_prestamo' => '2025-10-07',
            'fecha_devolucion' => '2025-11-07',
            'estado' => 'activo'
        ]);

        Prestamo::create([
            'id_usuario' => 2, // Jenifer
            'id_libro' => 2,   // El duque y yo
            'fecha_prestamo' => '2025-10-10',
            'fecha_devolucion' => '2025-11-10',
            'estado' => 'activo'
        ]);
    }
}
