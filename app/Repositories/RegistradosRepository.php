<?php

namespace App\Repositories;

use App\Registrado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RegistradosRepository
 * @package App\Repositories
 * @version June 18, 2020, 5:03 pm -03
 *
 * @method Registrados findWithoutFail($id, $columns = ['*'])
 * @method Registrados find($id, $columns = ['*'])
 * @method Registrados first($columns = ['*'])
*/
class RegistradosRepository extends BaseRepository
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
        return Registrado::class;
    }
}
