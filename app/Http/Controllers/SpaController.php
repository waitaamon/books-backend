<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Route;

class SpaController extends Controller
{
    /**
     * redirect to the correct layout
     * @return Factory|View
     */
    public function index()
    {
        $route = Route::current();

        if(!empty($route->parameters) && substr($route->parameters['any'], 0, 5) === 'admin') {

            return view('admin');
        }

        return view('welcome');
    }

}
