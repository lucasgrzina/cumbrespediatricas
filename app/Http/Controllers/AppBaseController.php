<?php

namespace App\Http\Controllers;

use Response;
use App\Configuraciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Utils\ResponseUtil;
use App\Http\Requests\Front\RegistrarRequest;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    protected $data = [];
    

    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

}
