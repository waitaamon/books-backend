<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;

class UserController extends Controller
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

    public function index(Request $request) {
        return response()->json([
            'data' => $request->user()
        ]);
    }
}
