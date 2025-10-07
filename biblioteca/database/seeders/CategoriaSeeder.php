<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Fantasía',
            'descripcion' => 'Libros de mundos mágicos, criaturas sobrenaturales y aventuras épicas.',
        ]);

        Categoria::create([
            'nombre' => 'Romance',
            'descripcion' => 'Historias de amor y relaciones.',
        ]);

        Categoria::create([
            'nombre' => 'Drama',
            'descripcion' => 'Historias intensas y emocionales.',
        ]);
    }
}
