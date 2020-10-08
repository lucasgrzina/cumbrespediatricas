<?php

namespace App\Http\Controllers\Admin;

use Response;
use Illuminate\Http\Request;
use App\Helpers\EventosHelper;
use App\Repositories\RegistradosRepository;
use App\Repositories\Criteria\EventoCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\Admin\CURegistradosRequest;
use App\Http\Controllers\Admin\CrudAdminController;

class RegistradosController extends CrudAdminController
{
    protected $routePrefix = 'registrados';
    protected $viewPrefix  = 'admin.registrados.';
    protected $actionPerms = 'registrados';

    public function __construct(RegistradosRepository $repo)
    {
        $this->repository = $repo;

        //$this->middleware('permission:ver-'.$this->actionPerms, ['only' => ['index','filter','show']]);        
        //$this->middleware('permission:editar-'.$this->actionPerms, ['only' => ['create','store','edit','update','destroy']]);          
    }

    public function index()
    {
        parent::index();
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

    public function store(CURegistradosRequest $request)
    {
        $model = $this->_store($request);
        return $this->sendResponse($model,trans('admin.success'));        
    }

    public function edit($id)
    {
        parent::edit($id);

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function update($id, CURegistradosRequest $request)
    {
        $model = $this->_update($id, $request);

        return $this->sendResponse($model,trans('admin.success'));
    }

    public function exportXls(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $this->repository->pushCriteria(new EventoCriteria($request));
        $data = $this->repository->all()->toArray();        
        $name = 'Registrados';
        $header = [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'especialidad' => 'Especialidad',
            'pais' => 'Pais',
            'email' => 'Email',
            'created_at' => 'Fecha Insc.'
        ];
        $format = [
        ];
        return $this->_exportXls($data,$header,$format,$name);
    }        
}
