<?php

namespace App\Http\Controllers\auth;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;

class LoginController extends Controller
{
    /**
     * @var JWTAuth
     */
    protected $auth;

    /**
     * LoginController constructor.
     * @param JWTAuth $auth
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param LoginFormRequest $request
     */
    public function index(LoginFormRequest $request)
    {

    }
}
