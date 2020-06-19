<?php

namespace App;

use App\Traits\UploadableTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Yajra\Auditable\AuditableTrait;
//use Dimsav\Translatable\Translatable;

/**
 * Class Encuestas
 * @package App
 * @version June 19, 2020, 5:43 pm -03
 *
 * @property string resp_1
 * @property string resp_2
 * @property string resp_3
 * @property string resp_4
 * @property integer registrado_id
 */
class Encuestas extends Model
{

    public $table = 'encuestas';
    
    
    public $fillable = [
        'resp_1',
        'resp_2',
        'resp_3',
        'resp_4',
        'registrado_id',
        //'enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'resp_1' => 'string',
        'resp_2' => 'string',
        'resp_3' => 'string',
        'resp_4' => 'string',
        'registrado_id' => 'integer',
        //'enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
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
