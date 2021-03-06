<?php

namespace App;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Registrado extends Authenticatable
{
    public $table = 'registrados';
    protected $rememberTokenName = false;
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
        'evento',
        'password',
        'institucion',
        'ciudad',
        'adicional'
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

    protected $casts = [
        'adicional' => 'array'
    ];

    public function acciones()
    {
        return $this->hasMany('App\RegistradoAccion', 'registrado_id');
    }

    public function encuestas()
    {
        return $this->hasMany('App\Encuestas', 'registrado_id');
    }    

    public function mensajesChat()
    {
        return $this->hasMany('App\Chat','registrado_id');
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
