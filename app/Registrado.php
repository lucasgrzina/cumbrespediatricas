<?php

namespace App;

use Eloquent as Model;


class Registrado extends Model
{
    public $table = 'registrados';

    
    public $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'pais',
        'email',
        'id_externo',
        'token',
        'certificado'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'especialidad' => 'required',
        'pais' => 'required',
        'email' => 'required|email'
    ];

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
