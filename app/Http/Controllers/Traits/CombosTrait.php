<?php

namespace App\Http\Controllers\Traits;

use App\Repositories\MonedaRepository;
use App\Repositories\ProveedorRepository;
use App\Repositories\ProyectoRepository;
use App\Repositories\RubroRepository;
use App\Repositories\UserRepository;
use App\TrabajoTercerizadoStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CombosTrait
{
    public function comboProveedores($rubro_id = NULL,$excluir_id = NULL)
    {
        $repo = \App::make(ProveedorRepository::class);
        $data = $repo->scopeQuery(function($q) use($rubro_id,$excluir_id) {
            if ($excluir_id) {
                $q = $q->where('id','!=',$excluir_id);
            }
            if ($rubro_id)
            {
                return $q->whereHas('rubros',function($q) use($rubro_id) {
                    $q->whereRubroId($rubro_id);
                })->orderBy('razon_social','asc'); 
            }
        })->all(['id','razon_social'])->toArray();

        return $data;
    }

    public function comboMisProyectos($user_id = NULL,$excluir_id=NULL)
    {
        $repo = \App::make(ProyectoRepository::class);
        $user_id = $user_id ? $user_id : Auth::guard('admin')->user()->id; 
        
        $data = $repo->with('cliente.pais')->scopeQuery(function($q) use($user_id,$excluir_id) {
                if ($excluir_id) {
                    $q = $q->where('id','!=',$excluir_id);
                }
                return $q->whereHas('users', function($q){
                    $q->where('user_id', Auth::guard('admin')->user()->id);
                })->orderBy('nombre');   
        })->all()->toArray();

        return $data;
    }    

    public function comboResponsablesTrabajos($excluir_id=NULL)
    {
        $repo = \App::make(UserRepository::class);
        
        $data = $repo->scopeQuery(function($q) use($excluir_id) {
                if ($excluir_id) {
                    $q = $q->where('id','!=',$excluir_id);
                }
                return $q->select('id','nombre','apellido')->whereEnabled(true)->orderBy('nombre');   
        })->all(['id','nombre'])->toArray();

        return $data;
    }  

    public function comboRubrosProveedores($excluir_id=NULL)
    {
        $repo = \App::make(RubroRepository::class);
        
        $data = $repo->scopeQuery(function($q) use($excluir_id) {
                if ($excluir_id) {
                    $q = $q->where('id','!=',$excluir_id);
                }
                return $q->select('id','nombre')->orderBy('nombre');   
        })->all(['id','nombre'])->toArray();

        return $data;
    }      

    public function comboMonedas($excluir_id=NULL)
    {
        $repo = \App::make(MonedaRepository::class);
        
        $data = $repo->scopeQuery(function($q) use($excluir_id) {
                if ($excluir_id) {
                    $q = $q->where('id','!=',$excluir_id);
                }
                return $q->select('id','nombre','signo')->orderBy('id');   
        })->all(['id','nombre','signo'])->toArray();

        return $data;
    }

    public function comboStatusTrabajos($excluir_id=NULL,$in=false)
    {
        $data = TrabajoTercerizadoStatus::where(function($q) use($excluir_id,$in) {
                //$q->where('id','!=',6);
                if ($excluir_id) {
                    if (is_array($excluir_id)) {
                        $q = $q->whereNotIn('id', $excluir_id);
                    } else {
                        $q = $q->where('id','!=',$excluir_id);    
                    }
                    
                }
                if (is_array($in)) {
                    $q = $q->whereIn('id',$in);
                }
                $q->where('id','!=',7);
        })->orderBy('orden')->get(['id','nombre'])->toArray();

        return $data;
    }               
}