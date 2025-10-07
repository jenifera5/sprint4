<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Categoria;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $fantasia = Categoria::where('nombre', 'Fantasía')->first();
        $romance  = Categoria::where('nombre', 'Romance')->first();

        $l1 = Libro::create([
            'titulo' => 'El duque y yo',
            'autor' => 'Julia Quinn',
            'anio' => 2024,
            'disponibles' => 1,
        ]);

        $l2 = Libro::create([
            'titulo' => 'Sempiterno',
            'autor' => 'Joana Marcús',
            'anio' => 2025,
            'disponibles' => 5,
        ]);

        $l3 = Libro::create([
            'titulo' => 'Alas de sangre',
            'autor' => 'Rebecca Yarros',
            'anio' => 2023,
            'disponibles' => 0,
        ]);

        // Asociamos a categorías
        $romance?->libros()->attach($l1->id);
        $fantasia?->libros()->attach($l2->id);
        $fantasia?->libros()->attach($l3->id);
    }
}
