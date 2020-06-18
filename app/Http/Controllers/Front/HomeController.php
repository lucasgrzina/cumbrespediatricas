<?php

namespace App\Http\Controllers\Front;


use App\Registrado;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Front\RegistrarRequest;

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
        return view('front.home');
    }

    public function indexVue()
    {
        if (\Cookie::get('registrado',null) !== null) {
            return redirect()->route('vivo');
        }

        $data = [
            'props' => [
                'urlRegistrar' => route('registrar')
            ]
        ];
        return view('front.home-vue', $data);
    } 

    public function vivo () {
        $data = [
            'props' => [
                ''
            ]
        ];
        return view('front.vivo', $data);
    }
    
    public function registrar(RegistrarRequest $request) {
        try {
            $data = Registrado::create($request->all());
            \Cookie::queue(\Cookie::make('registrado', 'si', 518400));
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }
}
