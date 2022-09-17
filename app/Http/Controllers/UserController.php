<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function signup(Request $request) {
        $rules = array(
            "email" => "required|email",
            "password" => "required|min:4|max:20"
        );

        $isValid = Validator::make($request->all(), $rules);
        if ($isValid->fails()) {
            return response()->json($isValid->errors(), 400);
        }
        
        $findEmail = User::where('email','=',$request->email)->get();
        if(count($findEmail)) {
            return response([
                "code" => 400,
                "msg" => "email already registered"
            ],400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password)
        ]);
        
        if($user) {
            return response([
                "code" => 201,
                "msg" => "Successfully Registered"
            ],201);
        }
    }
    
    
    public function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();

            if(!$user) {
                return response([
                    'code' => 404,
                    'msg' => "Email Address doesn't exists into the system"
                ],404);
            }
            if (!Hash::check($request->password, $user->password)) {
                return response([
                   "code" => 400,
                   "msg" => "Either email or password is incorrect" 
                ], 400);
            }
            $token = $user->createToken('my-app-token')->plainTextToken;
        
            return response([
                'code' => 200,
                'msg' => "Login successfully",
                'token' => $token,
                'userId' => $user->id
            ],200);    
    }

    public function logout() {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return response([
            'code' => 200,
            'msg' => "Logout successfully"
        ],200);
    }
}
