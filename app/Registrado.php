<?php

namespace App;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Registrado extends Authenticatable
{
    public $table = 'registrados';

    protected $guard = 'web';
    public $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'pais',
        'email',
        'id_externo',
        'token',
        'certificado',
        'evento'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        //'especialidad' => 'required',
        //'pais' => 'required',
        'email' => 'required'
    ];

    public function acciones()
    {
        return $this->hasMany('App\RegistradoAccion', 'registrado_id');
    }

    public function encuestas()
    {
        return $this->hasMany('App\Encuestas', 'registrado_id');
    }    

    /**
     * Appends Attributes
     *
     * @var array
     */

    protected static function boot()
    {
        parent::boot();

        /*static::deleted(function ($model) 
        {
            $model->deleteTranslations();
            $model->name = $model->id . '_' . $model->name;
            $model->save();
        });*/        
    }    

}
