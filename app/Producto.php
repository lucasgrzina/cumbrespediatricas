<?php

namespace App;

use App\Seccion;
use Eloquent as Model;
use App\Traits\UploadableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

//use Yajra\Auditable\AuditableTrait;
//use Dimsav\Translatable\Translatable;

/**
 * Class Producto
 * @package App
 * @version May 8, 2020, 11:31 pm -03
 *
 * @property integer seccion_id
 * @property string nombre
 * @property string imagen
 * @property string codigo
 * @property decimal precio
 * @property boolean enabled
 */
class Producto extends Model
{
    //use SoftDeletes;

    //use AuditableTrait;
    //use Translatable;
    use UploadableTrait;

    public $table = 'productos';
    
    /**
     * Translatable
     */

    //public $translatedAttributes = ['name'];

    /**
     * Uploadable
     *
     * files, targetDir, tmpDir, disk
     */

    public $files = ['imagen'];
    public $targetDir = 'productos';
    
    //protected $dates = ['deleted_at'];

    
    public $fillable = [
        'seccion_id',
        'nombre',
        'imagen',
        'codigo',
        'precio',
        'enabled',
        //'enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'seccion_id' => 'integer',
        'nombre' => 'string',
        'imagen' => 'string',
        'codigo' => 'string',
        'enabled' => 'boolean',
        'precio' => 'float(15,2)'
        //'enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'seccion_id' => 'required',
        'nombre' => 'required',
        'imagen' => 'required',
        'codigo' => 'required',
        'precio' => 'required',
        //'enabled' => 'boolean'
    ];

    /**
     * Appends Attributes
     *
     * @var array
     */
    protected $appends = ['imagen_url','precio_partes'];

    public function getPrecioPartesAttribute($value) 
    {
        return explode('.',$this->precio);
    }   


    public function getImagenUrlAttribute($value) 
    {
        return \FUHelper::fullUrl($this->targetDir,$this->imagen);
    }   

    public function seccion() {
        return $this->belongsTo(Seccion::class, 'seccion_id');
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
