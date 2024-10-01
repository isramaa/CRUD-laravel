<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $table = 'pedidos'; 


    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'calle',
        'ciudad',
        'cp',
        'estado',
        'producto',
        'cantidad',
        'total',
        'status'
    ];
    use HasFactory;
}
