<?php

namespace App;

use App\Registrado;
use Eloquent as Model;
use App\Traits\UploadableTrait;

use Yajra\Auditable\AuditableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'resp_9',
        'resp_10',
        'resp_11',
        'resp_12',
        'resp_13',
        'resp_14',
        'resp_15',
        'resp_16',
        'resp_17',
        'resp_18',
        'resp_19',
        'resp_20',
        'resp_21',
        'resp_22',
        'resp_23',
        'resp_24',
        'resp_25',
        'resp_26',
        'resp_27',
        'resp_28',
        'resp_29',
        'resp_30',
        'registrado_id',
        'evento'
        //'enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'registrado_id' => 'integer',
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
    protected $appends = ['valor_resp_1','valor_resp_2','valor_resp_3','valor_resp_4','valor_resp_5','valor_resp_6','valor_resp_7','valor_resp_8'];

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
    public function getValorResp6Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_6']);
    } 
    public function getValorResp7Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_7']);
    } 
    public function getValorResp8Attribute($value) 
    {
        return $this->valorResp($this->attributes['resp_8']);
    }                      
            
    
    protected function valorResp($value) {
        $valores = [
            '1' => 'Totalmente en desacuerdo',
            '2' => 'En desacuerdo',
            '3' => 'Ni en desacuerdo ni de acuerdo',
            '4' => 'De acuerdo',
            '5' => 'Totalmente de acuerdo'
        ];

        if (isset($valores[$value])) {
            return $valores[$value];
        } else {
            return $value;
        }
        
    }

    public function registrado()
    {
        return $this->belongsTo(Registrado::class, 'registrado_id');
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
