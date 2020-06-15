<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Categoria;
use Illuminate\Http\Request;
use App\Repositories\SeccionRepository;
use App\Http\Requests\Admin\CUSeccionRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\Admin\CrudAdminController;

class SeccionController extends CrudAdminController
{
    protected $routePrefix = 'secciones';
    protected $viewPrefix  = 'admin.secciones.';
    protected $actionPerms = 'secciones';

    public function __construct(SeccionRepository $repo)
    {
        $this->repository = $repo;

        //$this->middleware('permission:ver-'.$this->actionPerms, ['only' => ['index','filter','show']]);        
        //$this->middleware('permission:editar-'.$this->actionPerms, ['only' => ['create','store','edit','update','destroy']]);          
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
            $collection = $this->repository->with('categoria')->paginate($request->get('per_page'))->toArray();        

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
                'orden' => 1,
                'categoria_id' => null
        ]);

        data_set($this->data, 'info', [
            'categorias' => Categoria::orderBy('nombre')->get()
        ]);        

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function store(CUSeccionRequest $request)
    {
        $model = $this->_store($request);
        return $this->sendResponse($model,trans('admin.success'));        
    }

    public function edit($id)
    {
        parent::edit($id);

        data_set($this->data, 'info', [
            'categorias' => Categoria::orderBy('nombre')->get()
        ]);   
                
        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function update($id, CUSeccionRequest $request)
    {
        $model = $this->_update($id, $request);

        return $this->sendResponse($model,trans('admin.success'));
    }

    protected function _destroy($model)
    {
        if (empty($model)) {
            throw new Exception(trans('admin.not_found'), 1);
        }
        foreach ($model->productos as $producto) {
            $producto->delete();
        }
        $model->delete();
    }     
}
