<?php

namespace App\Http\Controllers\Admin;

use Response;
use Illuminate\Http\Request;
use App\Helpers\EventosHelper;
use App\Repositories\ConfiguracionesRepository;
use App\Repositories\Criteria\EventoCriteria;
use App\Http\Requests\Admin\CUConfiguracionesRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\Admin\CrudAdminController;

class ConfiguracionesController extends CrudAdminController
{
    protected $routePrefix = 'configuraciones';
    protected $viewPrefix  = 'admin.configuraciones.';
    protected $actionPerms = 'configuraciones';

    public function __construct(ConfiguracionesRepository $repo)
    {
        $this->repository = $repo;

        //$this->middleware('permission:ver-'.$this->actionPerms, ['only' => ['index','filter','show']]);        
        //$this->middleware('permission:editar-'.$this->actionPerms, ['only' => ['create','store','edit','update','destroy']]);          
    }

    public function index()
    {
        parent::index();
        $this->data['url_save'] = route($this->routePrefix.'.store');
        $this->data['filters']['export_xls'] = false;
        $this->data['filters']['sortedBy'] = 'asc';
        $this->data['info']['eventos'] = EventosHelper::combo();
        $this->data['filters']['evento'] = count($this->data['info']['eventos']) > 0 ? $this->data['info']['eventos'][0]['id'] : null;
        return view($this->viewPrefix.'index')->with('data',$this->data);
    }

    public function filter(Request $request)
    {
        try
        {
            $this->repository->pushCriteria(new RequestCriteria($request));
            $this->repository->pushCriteria(new EventoCriteria($request));
            $collection = $this->repository->paginate($request->get('per_page'))->toArray();        

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
                'id' => 0
        ]);

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function store(CUConfiguracionesRequest $request)
    {
        $model = $this->_store($request);
        return $this->sendResponse($model,trans('admin.success'));        
    }

    public function edit($id)
    {
        parent::edit($id);

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function update($id, CUConfiguracionesRequest $request)
    {
        $model = $this->_update($id, $request);
        \Log::info('Borrar cache: '.'configuraciones_'.$request->evento);
        \Cache::forget('configuraciones_'.$request->evento);
        return $this->sendResponse($model,trans('admin.success'));
    }

    public function exportXls(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $this->repository->pushCriteria(new EventoCriteria($request));        
        $data = $this->repository->all()->toArray();        
        $name = 'Configuraciones';
        $header = [
            'id' => 'ID',
            'pregunta' => 'Pregunta',
        ];
        $format = [
        ];
        return $this->_exportXls($data,$header,$format,$name);
    }     
}
