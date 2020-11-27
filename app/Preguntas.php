<?php

namespace App;

use App\Traits\UploadableTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Yajra\Auditable\AuditableTrait;
//use Dimsav\Translatable\Translatable;

/**
 * Class Preguntas
 * @package App
 * @version June 19, 2020, 2:58 pm -03
 *
 * @property string pregunta
 * @property integer registrado_id
 */
class Preguntas extends Model
{
    //use SoftDeletes;

    //use AuditableTrait;
    //use Translatable;
    //use UploadableTrait;

    public $table = 'preguntas';
    
    /**
     * Translatable
     */

    //public $translatedAttributes = ['name'];

    /**
     * Uploadable
     *
     * files, targetDir, tmpDir, disk
     */

    //public $files = ['the_file'];
    //public $targetDir = 'preguntas';


    
    
    //protected $dates = ['deleted_at'];

    
    public $fillable = [
        'pregunta',
        'registrado_id',
        'evento',
        'destinatario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pregunta' => 'string',
        'registrado_id' => 'integer',
        //'enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pregunta' => 'required',
        //'enabled' => 'boolean'
    ];

    /**
     * Appends Attributes
     *
     * @var array
     */
    //protected $appends = ['the_file_url'];

    /*public function getTheFileUrlAttribute($value) 
    {
        return \FUHelper::fullUrl($this->targetDir,$this->the_file);
    }*/   

    public function registrado()
    {
        return $this->belongsTo('App\Registrado', 'registrado_id');
    }
    

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
