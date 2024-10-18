<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario'; // Nombre de la tabla
    protected $primaryKey = 'id_usuario'; // Especifica el campo de clave primaria
    public $incrementing = false; // Si no es autoincrementable
    protected $keyType = 'int'; // Cambia a 'int' si el id es numérico

    protected $fillable = [
        'user_name',
        'user_pass', 
        'user_tipo',
    ];

    protected $hidden = [
        'user_pass',
    ];

    public function getAuthPassword()
    {
        return $this->user_pass; // Campo para la contraseña cifrada
    }

    public $timestamps = false; // Desactivar timestamps si no se utilizan
}
