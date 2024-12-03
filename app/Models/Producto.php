<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    // Definimos los campos que pueden asignarse masivamente
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'min_stock',
        'barcode',
        'imagen'
    ];

    // Opcional: Puedes definir métodos adicionales si necesitas lógica personalizada.
}
