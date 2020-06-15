<?php

namespace App\Repositories;

use App\Proyecto;
use App\User;
use Illuminate\Support\Facades\Auth;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 10, 2017, 8:03 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre' => 'like',
        'apellido' => 'like',
        'email' => 'like',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function getDirectoresCuentas()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Director de cuentas');
        })->whereEnabled(true)->select('id','nombre','apellido')->get();
    }

    public function getAsistentesCuentas()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Asistente de cuentas');
        })->whereEnabled(true)->select('id','nombre','apellido')->get();
    }    

    public function getAdministrativos()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Administrativo');
        })->whereEnabled(true)->select('email')->get();
    }    

    public function getEjecutivosCuentas()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Ejecutivo de cuentas');
        })->whereEnabled(true)->select('id','nombre','apellido')->get();
    }        

    public function getSupervisoresCuentas()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Supervisor de cuentas');
        })->whereEnabled(true)->select('id','nombre','apellido')->get();
    }    

    public function getMisProyectos($combo = false)
    {
        $query = (new Proyecto)->newQuery()
                ->whereHas('users', function($q){
                    $q->where('user_id', Auth::guard('admin')->user()->id);
                });    

        if ($combo)
        {
            return $query->orderBy('nombre')->select('id','nombre')->get(['id','nombre']);
        }
        else
        {
            return $query->orderBy('id')->get();
        }
    }            
}
