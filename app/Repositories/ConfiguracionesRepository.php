<?php

namespace App\Repositories;

use App\Configuraciones;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConfiguracionesRepository
 * @package App\Repositories
 * @version June 19, 2020, 2:58 pm -03
 *
 * @method Configuraciones findWithoutFail($id, $columns = ['*'])
 * @method Configuraciones find($id, $columns = ['*'])
 * @method Configuraciones first($columns = ['*'])
*/
class ConfiguracionesRepository extends BaseRepository
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
        return Configuraciones::class;
    }
}
