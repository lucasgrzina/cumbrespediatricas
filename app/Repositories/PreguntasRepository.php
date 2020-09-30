<?php

namespace App\Repositories;

use App\Preguntas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PreguntasRepository
 * @package App\Repositories
 * @version June 19, 2020, 2:58 pm -03
 *
 * @method Preguntas findWithoutFail($id, $columns = ['*'])
 * @method Preguntas find($id, $columns = ['*'])
 * @method Preguntas first($columns = ['*'])
*/
class PreguntasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Preguntas::class;
    }
}
