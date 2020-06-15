<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Seccion;
use Illuminate\Http\Request;
use App\Repositories\ProductoRepository;
use App\Http\Requests\Admin\CUProductoRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\Admin\CrudAdminController;

class ProductoController extends CrudAdminController
{
    protected $routePrefix = 'productos';
    protected $viewPrefix  = 'admin.productos.';
    protected $actionPerms = 'productos';

    public function __construct(ProductoRepository $repo)
    {
        $this->repository = $repo;

        $this->middleware('permission:ver-'.$this->actionPerms, ['only' => ['index','filter','show']]);        
        $this->middleware('permission:editar-'.$this->actionPerms, ['only' => ['create','store','edit','update','destroy']]);          
    }

    public function index()
    {
        parent::index();

        return view($this->viewPrefix.'index')->with('data',$this->data);
    }

    public function filter(Request $request)
    {
        try
        {
            $this->repository->pushCriteria(new RequestCriteria($request));
            $collection = $this->repository->with('seccion.categoria')->paginate($request->get('per_page'))->toArray();        

            $this->data = [
                'list' => $collection['data'],
                'paging' => array_only($collection,['total','current_page','last_page'])
            ];   

        }
        catch (\Exception $ex) 
        {
            return $this->sendError($ex->getMessage(),500);
        } 

        return $this->sendResponse($this->data, trans('admin.success'));
    }

    public function show($id)
    {
        parent::show($id);

        //$this->data['selectedItem']->load('xxx');

        return view($this->viewPrefix.'show')->with('data', $this->data);
    }

    public function create()
    {
        parent::create();

        data_set($this->data, 'selectedItem', [
                'id' => 0,
                'seccion_id' => null,
                'imagen' => null,
                'imagen_url' => null,
                'precio' => 0,
                'enabled' => true
        ]);

        data_set($this->data, 'info', [
            'secciones' => Seccion::with(['categoria' => function ($q) {
                $q->orderBy('nombre');
            }])->orderBy('nombre')->get()
        ]);        

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function store(CUProductoRequest $request)
    {
        $model = $this->_store($request);
        return $this->sendResponse($model,trans('admin.success'));        
    }

    public function edit($id)
    {
        parent::edit($id);
        data_set($this->data, 'info', [
            'secciones' => Seccion::with(['categoria' => function ($q) {
                $q->orderBy('nombre');
            }])->orderBy('nombre')->get()
        ]);   
        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function update($id, CUProductoRequest $request)
    {
        $model = $this->_update($id, $request);

        return $this->sendResponse($model,trans('admin.success'));
    }
}
