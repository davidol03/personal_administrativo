<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'cita'; // Nombre de la tabla
    protected $primaryKey = 'id_cita'; // Columna primaria

    protected $fillable = [
        'id_cita',
        'fecha_hora_cita',
        'id_medico',
        'fecha_modificacion',
        'id_estatus',
        'id_estatus_usuario',
        'id_paciente',
    ];

    public $timestamps = false; // Desactiva la gestión automática de created_at y updated_at

    // Relación con Medico
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }


    // Relación con Estatus
    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'id_estatus');
    }

    // Relación con EstatusUsuario
    public function estatusUsuario()
    {
        return $this->belongsTo(EstatusUsuario::class, 'id_estatus_usuario');
    }
}
