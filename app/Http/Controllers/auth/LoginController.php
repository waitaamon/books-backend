<?php

namespace App\Http\Controllers\auth;

use App\Http\Requests\LoginFormRequest;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(LoginFormRequest $request)
    {
        try{
            if(!$token = $this->auth->attempt($request->only('email','password'))){
                return response()->json([
                    'errors' => [
                        'root' => [
                            'Incorrect username or password.'
                        ]
                    ]
                ], 422);
            }
        }catch (JWTException $e){
            return response()->json([
                'errors' => [
                    'root' => [
                        'Incorrect username or password.'
                    ]
                ]
            ], $e->getStatusCode());
        }

        return response()->json([
            'data' => $request->user(),
            'meta' => [
                'token' => $token
            ]
        ], 200);
    }
}
