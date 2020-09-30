<?php

namespace App\Repositories;

use App\Encuestas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EncuestasRepository
 * @package App\Repositories
 * @version June 19, 2020, 5:43 pm -03
 *
 * @method Encuestas findWithoutFail($id, $columns = ['*'])
 * @method Encuestas find($id, $columns = ['*'])
 * @method Encuestas first($columns = ['*'])
*/
class EncuestasRepository extends BaseRepository
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
        return Encuestas::class;
    }
}
