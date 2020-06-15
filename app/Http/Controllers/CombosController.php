<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Traits\CombosTrait;
//use App\Repositories\ProveedorRepository;
//use App\Repositories\RubroRepository;
use Illuminate\Http\Request;

class CombosController extends AppBaseController
{
	use CombosTrait;

	public function proveedores($rubro_id = NULL)
	{
		$data = static::comboProveedores($rubro_id);
		return $this->sendResponse($data, 'La operacion finalizo con exito');
	}
}
