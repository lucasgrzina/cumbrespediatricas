<?php

namespace App;

use Eloquent as Model;


class RegistradoAccion extends Model
{
    public $table = 'registrados_acciones';

    
    public $fillable = [
        'registrado_id',
        'accion',
        'desde',
        'hasta'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'registrado_id' => 'required',
        'accione' => 'required',
    ];

    public function registrado()
    {
        return $this->belongsTo('App\Registrado', 'registrado_id');
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
