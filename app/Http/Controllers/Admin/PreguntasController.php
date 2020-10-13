<?php

namespace App\Http\Controllers\Admin;

use Response;
use Illuminate\Http\Request;
use App\Helpers\EventosHelper;
use App\Repositories\PreguntasRepository;
use App\Repositories\Criteria\EventoCriteria;
use App\Http\Requests\Admin\CUPreguntasRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\Admin\CrudAdminController;

class PreguntasController extends CrudAdminController
{
    protected $routePrefix = 'preguntas';
    protected $viewPrefix  = 'admin.preguntas.';
    protected $actionPerms = 'preguntas';

    public function __construct(PreguntasRepository $repo)
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

    public function store(CUPreguntasRequest $request)
    {
        $model = $this->_store($request);
        return $this->sendResponse($model,trans('admin.success'));        
    }

    public function edit($id)
    {
        parent::edit($id);

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function update($id, CUPreguntasRequest $request)
    {
        $model = $this->_update($id, $request);

        return $this->sendResponse($model,trans('admin.success'));
    }

    public function exportXls(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $this->repository->pushCriteria(new EventoCriteria($request));        
        $data = $this->repository->all()->toArray();        
        $name = 'Preguntas';
        $header = [
            'id' => 'ID',
            'pregunta' => 'Pregunta',
            'destinatario' => 'Destinatario',
        ];
        $format = [
        ];
        return $this->_exportXls($data,$header,$format,$name);
    }     
}
