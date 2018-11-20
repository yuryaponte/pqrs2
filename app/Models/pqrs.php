<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pqrs
 * @package App\Models
 * @version November 13, 2018, 12:22 pm UTC
 *
 * @property string nombre
 * @property string documento
 * @property string correo
 * @property string telefono
 * @property string direccion
 * @property string motivo_de_solicitud
 */
class pqrs extends Model
{
    use SoftDeletes;

    public $table = 'pqrs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'documento',
        'correo',
        'telefono',
        'direccion',
        'motivo_de_solicitud'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'documento' => 'string',
        'correo' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'motivo_de_solicitud' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|min:6',
        'documento' => 'required|min:6',
        'correo' => 'required|email|min:6',
        'telefono' => 'required|min:6',
        'direccion' => 'required|min:6',
        'motivo_de_solicitud' => 'required|max:500'
    ];

    
}
