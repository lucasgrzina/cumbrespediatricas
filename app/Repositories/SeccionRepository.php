<?php

namespace App\Repositories;

use App\Seccion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeccionRepository
 * @package App\Repositories
 * @version May 8, 2020, 8:24 pm -03
 *
 * @method Seccion findWithoutFail($id, $columns = ['*'])
 * @method Seccion find($id, $columns = ['*'])
 * @method Seccion first($columns = ['*'])
*/
class SeccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Seccion::class;
    }
}
