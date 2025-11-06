<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Préstamo activo (no devuelto) - María con "El duque y yo"
        Prestamo::create([
            'id_usuario' => 2, // María
            'id_libro' => 1,   // El duque y yo
            'fecha_prestamo' => Carbon::now()->subDays(10)->format('Y-m-d'),
            'fecha_devolucion' => Carbon::now()->addDays(20)->format('Y-m-d'),
            'devuelto' => false // Préstamo activo
        ]);

        // Préstamo activo - Jenifer con "Sempiterno"
        Prestamo::create([
            'id_usuario' => 1, // Jenifer
            'id_libro' => 2,   // Sempiterno
            'fecha_prestamo' => Carbon::now()->subDays(5)->format('Y-m-d'),
            'fecha_devolucion' => Carbon::now()->addDays(25)->format('Y-m-d'),
            'devuelto' => false
        ]);

        // Préstamo devuelto (histórico) - Juan con "El duque y yo"
        Prestamo::create([
            'id_usuario' => 3, // Juan (si existe)
            'id_libro' => 1,
            'fecha_prestamo' => Carbon::now()->subDays(60)->format('Y-m-d'),
            'fecha_devolucion' => Carbon::now()->subDays(30)->format('Y-m-d'),
            'devuelto' => true // Ya fue devuelto
        ]);

        // Préstamo devuelto - María con "Sempiterno"
        Prestamo::create([
            'id_usuario' => 2, // María
            'id_libro' => 2,
            'fecha_prestamo' => Carbon::now()->subDays(45)->format('Y-m-d'),
            'fecha_devolucion' => Carbon::now()->subDays(15)->format('Y-m-d'),
            'devuelto' => true
        ]);

        // Préstamo retrasado (fecha de devolución pasada, no devuelto)
        Prestamo::create([
            'id_usuario' => 4, // Ana (si existe)
            'id_libro' => 2,
            'fecha_prestamo' => Carbon::now()->subDays(35)->format('Y-m-d'),
            'fecha_devolucion' => Carbon::now()->subDays(5)->format('Y-m-d'), // ¡Fecha pasada!
            'devuelto' => false // Todavía no devuelto = RETRASADO
        ]);

        echo "✅ Préstamos creados exitosamente\n";
        echo "📚 2 préstamos activos\n";
        echo "✅ 2 préstamos devueltos (históricos)\n";
        echo "⚠️  1 préstamo retrasado\n";
    }
}