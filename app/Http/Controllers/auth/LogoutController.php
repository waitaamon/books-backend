<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;

class LogoutController extends Controller
{
    /**
     * @var JWTAuth
     */
    protected $auth;

    /**
     * UserController constructor.
     * @param JWTAuth $auth
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $this->auth->invalidate($this->auth->getToken());

        return response( null, 200);
    }
}
