<?php

namespace App\Repositories;

use App\Models\pqrs;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pqrsRepository
 * @package App\Repositories
 * @version November 13, 2018, 12:22 pm UTC
 *
 * @method pqrs findWithoutFail($id, $columns = ['*'])
 * @method pqrs find($id, $columns = ['*'])
 * @method pqrs first($columns = ['*'])
*/
class pqrsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'documento',
        'correo',
        'telefono',
        'direccion',
        'motivo_de_solicitud'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pqrs::class;
    }
}
