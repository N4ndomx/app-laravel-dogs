<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use HasFactory, SoftDeletes;

    // Si la tabla en la base de datos tiene un nombre diferente
    protected $table = 'mascotas';

    // Si necesitas definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'especie', 'raza', 'edad', 'peso', 'dueno', 'contacto', 'imagen'];
}
