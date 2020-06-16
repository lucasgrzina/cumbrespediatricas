<?php

namespace App\Repositories;

use App\Producto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductoRepository
 * @package App\Repositories
 * @version May 8, 2020, 11:31 pm -03
 *
 * @method Producto findWithoutFail($id, $columns = ['*'])
 * @method Producto find($id, $columns = ['*'])
 * @method Producto first($columns = ['*'])
*/
class ProductoRepository extends BaseRepository
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
        return Producto::class;
    }
}
