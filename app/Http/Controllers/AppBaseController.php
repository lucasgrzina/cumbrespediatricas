<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Utils\ResponseUtil;

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
