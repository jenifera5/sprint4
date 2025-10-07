<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'nombre'   => $this->faker->name(), // genera nombres aleatorios
            'email'    => $this->faker->unique()->safeEmail(), // siempre único
            'password' => '123456', // texto plano porque no usas login
        ];
    }
}
