<?php

namespace App;

//use App\Traits\UploadableTrait;
use App\Producto;
use App\Categoria;
use Eloquent as Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

//use Yajra\Auditable\AuditableTrait;
//use Dimsav\Translatable\Translatable;

/**
 * Class Seccion
 * @package App
 * @version May 8, 2020, 8:24 pm -03
 *
 * @property string nombre
 * @property integer categoria_id
 * @property integer orden
 * @property integer enabled
 */
class Seccion extends Model
{
    //use SoftDeletes;

    //use AuditableTrait;
    //use Translatable;
    //use UploadableTrait;

    public $table = 'secciones';
    
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
    //public $targetDir = 'seccions';


    
    
    //protected $dates = ['deleted_at'];

    
    public $fillable = [
        'nombre',
        'categoria_id',
        'orden',
        'enabled',
        //'enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'categoria_id' => 'integer',
        'orden' => 'integer',
        'enabled' => 'boolean',
        //'enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|unique:secciones,nombre,{:id},id,categoria_id,{:categoria_id}',
        'categoria_id' => 'required',
        'orden' => 'required',
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


    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    
    public function productos() {
        return $this->hasMany(Producto::class, 'seccion_id');
    }     

    protected static function boot()
    {
        parent::boot();
    
    }    

}
