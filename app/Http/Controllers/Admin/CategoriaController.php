<?php

namespace App\Http\Controllers\Admin;

use Response;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Repositories\CategoriaRepository;

use App\Http\Requests\Admin\CUCategoriaRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\Admin\CrudAdminController;


class CategoriaController extends CrudAdminController
{
    /** @var  cuitRepository */
    use FileUploadTrait;
    protected $routePrefix = 'categorias';
    protected $viewPrefix = 'admin.categorias.';
    protected $actionPerms = 'categorias';
    //private 

    public function __construct(CategoriaRepository $repo)
    {
        $this->repository = $repo;
        $this->middleware('permission:ver-'. $this->actionPerms, ['only' => ['index', 'filter','show']]);        
        $this->middleware('permission:editar-'. $this->actionPerms, ['only' => ['create', 'store','destroy','edit','update']]);        
        
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


    public function create()
    {
        parent::create();

        data_set($this->data, 'selectedItem', [
                'id' => 0,
                'nombre' => null,
                'orden' => 1,
        ]);

        /*data_set($this->data, 'selectedItem', [
            'imagen' => null,
            'imagen_url' => null
        ]);
        data_set($this->data,'url_importar_archivo',route($this->routePrefix.'.importar-archivo'));
            */

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function store(CUCategoriaRequest $request)
    {
        $model = $this->_store($request);
        return $this->sendResponse($model,trans('admin.success'));        
    }

    public function edit($id)
    {
        parent::edit($id);

        //data_set($this->data,'url_importar_archivo',route($this->routePrefix.'.importar-archivo'));

        return view($this->viewPrefix.'cu')->with('data',$this->data);
    }

    public function update($id, CUCategoriaRequest $request)
    {
        $model = $this->_update($id, $request);
        return $this->sendResponse($model,trans('admin.success'));
    } 

    protected function _destroy($model)
    {
        if (empty($model)) {
            throw new Exception(trans('admin.not_found'), 1);
        }

        foreach ($model->secciones as $seccion) {
            foreach ($seccion->productos as $producto) {
                $producto->delete();
            }
            $seccion->delete();
        }

        $model->delete();
    } 
    
}
