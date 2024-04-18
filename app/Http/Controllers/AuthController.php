<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();

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
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json($user);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Tạo tài khoản thất bại'
            ], 500);
        }
    }
}
