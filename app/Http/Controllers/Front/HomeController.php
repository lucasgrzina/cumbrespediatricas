<?php

namespace App\Http\Controllers\Front;

use App\Pricing;
use App\Categoria;
use App\Http\Controllers\AppBaseController;

class HomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        return view('front.home');
    }
}
