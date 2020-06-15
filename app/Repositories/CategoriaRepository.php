<?php

namespace App\Repositories;


use App\Cuit;
use App\Contacto;
use App\Categoria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CuitRepository
 * @package App\Repositories
 * @version November 10, 2017, 8:03 pm UTC
 *
 * @method Cuit findWithoutFail($id, $columns = ['*'])
 * @method Cuit find($id, $columns = ['*'])
 * @method Cuit first($columns = ['*'])
*/
class CategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre' => 'like'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Categoria::class;
    }

}
