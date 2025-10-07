<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Jenifer',
            'email' => 'jenifer@gmail.com',
            'password' => '123456'
        ]);
        Usuario::create([
            'nombre' => 'Maria',
            'email' => 'Maria5@gmail.com',
            'password' => '123456'
        ]);
      
    }
}
