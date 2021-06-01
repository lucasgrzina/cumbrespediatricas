<?php

namespace App\Http\Controllers\Admin;

use Response;
use Illuminate\Http\Request;
use App\Helpers\EventosHelper;
use App\Repositories\EncuestasRepository;
use App\Repositories\Criteria\EventoCriteria;
use App\Http\Requests\Admin\CUEncuestasRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\Admin\CrudAdminController;

class EncuestasController extends CrudAdminController
{
    protected $routePrefix = 'encuestas';
    protected $viewPrefix  = 'admin.encuestas.';
    protected $actionPerms = 'encuestas';

    public function __construct(EncuestasRepository $repo)
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

    public function store(CUEncuestasRequest $request)
    {
        $model = $this->_store($request);
        return $this->sendResponse($model,trans('admin.success'));        
    }

    public function edit($id)
    {
        parent::edit($id);

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function update($id, CUEncuestasRequest $request)
    {
        $model = $this->_update($id, $request);

        return $this->sendResponse($model,trans('admin.success'));
    }

    public function exportXls(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $this->repository->pushCriteria(new EventoCriteria($request));
        
        $data = $this->repository->with('registrado')->all()->toArray();        
        $name = 'Encuestas';
        $header = [
            'id' => 'ID',
            'nombre' => 'Nombre'
        ];
        $format = [
            'nombre' => function($valor,$row) {
                return $row['registrado']['nombre'];
            }
        ];        
        for($i=1;$i<=30;$i++) {
            $header['resp_'.$i] = 'Preg. '.$i;
            $format['resp_'.$i] = function ($value) {
                $valor = $value;
                \Log::info($valor);
                switch ($value) {
                    case 'Totalmente en desacuerdo':
                    case 'Igual que antes':
                        $valor = 1;
                        break;
                    case 'En desacuerdo':
                    case 'Ligeramente más que antes':
                        $valor = 2;
                        break;         
                    case 'Ni en desacuerdo ni de acuerdo':
                    case 'Moderadamente más que antes':
                        $valor = 3;
                        break;    
                    case 'De acuerdo':
                    case 'Mucho más que antes':
                        $valor = 4;
                        break;    
                    case 'Totalmente de acuerdo':
                    case 'Significativamente más que antes':
                        $valor = 5;
                        break;    						
                }
                return $valor;
            };
        }
        $header['created_at'] = 'Fecha';


        return $this->_exportXls($data,$header,$format,$name);
    }     
}
