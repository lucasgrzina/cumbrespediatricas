<?php

namespace App;

use App\Seccion;
use Carbon\Carbon;
use Eloquent as Model;

class Categoria extends Model
{
    public $table = 'categorias';

    public $fillable = [
        'nombre',
        'enabled',
        'orden'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    protected $casts = [
        'orden' => 'int',
        'enabled' => 'boolean'
    ];

    public static $rules = [
        'nombre' => 'required|unique:categorias,nombre,{:id},id',
    ];

    public function secciones() {
        return $this->hasMany(Seccion::class, 'categoria_id');
    }  

    protected static function boot()
    {
        parent::boot();
        
    }    
}
