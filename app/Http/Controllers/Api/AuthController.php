<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    /**
     * Create a new instance of the login 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * 
     * Get a JWT via given credentials
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if(!$token = JWTAuth::attempt($credentials)) {

            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * 
     * logout the user (Invalidate the token)
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        JWTAuth::logout();

        return response()->json(['message' => 'Your finalited the session']);
    }

    /**
     * 
     * Register user
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'user_name' => 'required|string',
            'first_name'=> 'required|string',
            'last_name' => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:8',
            'status'    => 'required',
        ]);

        if($validator->fails()) {

            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::created([
            'user_name' => request()->user_name,
            'first_name'=> request()->first_name,
            'last_name' => request()->last_name,
            'email'     => request()->email,
            'password'  => bcrypt(request()->name),
            'status'    => request()->status,
        ]);
        
        return response()->json($user, 201);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(JWTAuth::user());
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh());
    }

    protected function respondWithToken($token)
    {
        $expires_at = Carbon::now()->addDay();

        return response()->json([
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => $expires_at
        ]);
    }
}
