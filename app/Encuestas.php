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
        'resp_5',
        'resp_6',
        'resp_7',
        'resp_8',
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
        'resp_5' => 'string',
        'resp_6' => 'string',
        'resp_7' => 'string',
        'resp_8' => 'string',
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
    protected $appends = ['valor_resp_1','valor_resp_2','valor_resp_3','valor_resp_4','valor_resp_5'];

    public function getValorResp1Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_1']);
    }  
    public function getValorResp2Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_2']);
    }  
    public function getValorResp3Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_3']);
    }  
    public function getValorResp4Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_4']);
    }  
    public function getValorResp5Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_5']);
    }          
            
    
    protected function valorResp($value) {
        $valores = [
            '1' => 'Totalmente en desacuerdo',
            '2' => 'En desacuerdo',
            '3' => 'Ni en desacuerdo ni de acuerdo',
            '4' => 'De acuerdo',
            '5' => 'Totalmente de acuerdo'
        ];

        return $valores[$value];
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
