<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    /**
     * redirect to the correct layout
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $route = \Route::current();

        if(!empty($route->parameters) && substr($route->parameters['any'], 0, 5) === 'admin') {

            return view('admin');
        }

        return view('welcome');
    }

}
