<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
       use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'email', 'password'];

    // Un usuario tiene muchos préstamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'id_usuario');
    }
}
