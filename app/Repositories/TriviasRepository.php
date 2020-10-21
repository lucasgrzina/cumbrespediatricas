<?php

namespace App\Repositories;

use App\Trivias;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TriviasRepository
 * @package App\Repositories
 * @version October 20, 2020, 8:42 am -03
 *
 * @method Trivias findWithoutFail($id, $columns = ['*'])
 * @method Trivias find($id, $columns = ['*'])
 * @method Trivias first($columns = ['*'])
*/
class TriviasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'registrado_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Trivias::class;
    }
}
