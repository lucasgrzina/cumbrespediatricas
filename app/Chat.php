<?php

namespace App;

use App\Traits\UploadableTrait;
use Eloquent as Model;
/**
 * Class Trivias
 * @package App
 * @version October 20, 2020, 8:42 am -03
 *
 * @property integer registrado_id
 * @property string pregunta
 * @property string respuesta
 */
class Chat extends Model
{
    //use Translatable;
    //use UploadableTrait;

    public $table = 'chat';
    
    public $fillable = [
        'registrado_id',
        'mensaje',
        'reaccion',
        'emoticon',
        'tipo',
        'evento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'registrado_id' => 'integer',
        'mensaje' => 'string',
        //'enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'registrado_id' => 'required',
        'tipo' => 'required',
        
        //'enabled' => 'boolean'
    ];

    public function registrado()
    {
        return $this->belongsTo('App\Registrado', 'registrado_id');
    }
    

    protected static function boot()
    {
        parent::boot();       
    }    

}
