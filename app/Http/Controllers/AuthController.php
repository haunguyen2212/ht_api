<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected UserRepository $user;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->user = $userRepository;
    }

    public function login(LoginRequest $request){
        $user = $this->user->where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Thông tin tài khoản hoặc mật khẩu không chính xác',
            ], 404) ;
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'type_token' => 'Bearer',
        ]);
    }

    public function register(RegisterRequest $request){
        try{
            $user = $this->user->create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['data' => $user, 'message' => 'Tạo tài khoản thành công']);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Tạo tài khoản thất bại'
            ], 500);
        }
    }
}
