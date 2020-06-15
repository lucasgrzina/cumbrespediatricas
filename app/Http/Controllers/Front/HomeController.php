<?php

namespace App\Http\Controllers\Front;

use App\Pricing;
use App\Categoria;
use App\Http\Controllers\AppBaseController;

class HomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $menuCategorias = [];

        foreach($this->categorias()->get() as $cat) {
            $secciones = $cat->secciones->pluck('nombre','id');
            $menuCategorias[] = [
                'id' => $cat->id,
                'nombre' => $cat->nombre,
                'secciones' => $secciones
            ];
        }

        $contenido = $this->contenido();
        return view('front.home', compact(['menuCategorias','contenido']));
    }

    protected function categorias() {
        return Categoria::with(['secciones' => function($q) {
            $q->orderBy('orden');
        }])->whereHas('secciones', function ($q) {
            $q->whereHas('productos',function($q) {
                $q->whereEnabled(true);
            })->whereEnabled(true);
        })->whereEnabled(true)->orderBy('orden');
    }

    protected function contenido() {
        $data = $this->categorias()->with([
            'secciones' => function($q) {
                $q->orderBy('orden')->whereEnabled(true);
            },
            'secciones.productos' => function($q) {
                $q->orderBy('orden')->whereEnabled(true);
            }
        ])->get();

        return $data;
    }
}
