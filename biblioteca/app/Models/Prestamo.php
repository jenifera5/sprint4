<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_libro',
        'fecha_prestamo',
        'fecha_devolucion',
        'devuelto'  // CAMPO CORRECTO: boolean
    ];

    // Cast para asegurar que devuelto sea boolean
    protected $casts = [
        'devuelto' => 'boolean',
        'fecha_prestamo' => 'date',
        'fecha_devolucion' => 'date',
    ];

    /**
     * Un préstamo pertenece a un usuario
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    /**
     * Un préstamo pertenece a un libro
     */
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro');
    }
}




































































