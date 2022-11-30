<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserCustomer;
use App\Models\UserOwner;

class AuthController extends Controller
{

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
         $user = Auth::user();
         $success['token'] = $user->createToken('appToken')->plainTextToken;
         return response()->json([
          'success' => true,
          'token' => $success,
          'user' => $user,
         ],200);
        } else{
         return response()->json([
          'success' => false,
          'message' => 'Invalid Email or Password',
         ], 401);
        };
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required','string', 'email', 'max:255', 'unique:users'],
         'role_id' => ['required'],
         'password' => ['required', 'string', 'min:8'],
        ]);
        if($validator->fails()){
         return response()->json([
          'success' => false,
          'message' => $validator->errors(),
         ], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create([
            'email' => $input['email'],
            'role_id' => $input['role_id'],
            'password' => $input['password'],
        ]);
        if ($input['role_id'] == 3) {
            $cust = UserCustomer::create([
                'name' => $input['name'],
                'user_id' => $user->id
            ]);
        } else if($input['role_id'] == 4) {
            $owner = UserOwner::create([
                'name' => $input['name'],
                'user_id' => $user->id
            ]);
        }
        
        $success['token'] = $user->createToken('appToken')->plainTextToken;
        return response()->json([
         'success' => true,
         'token' => $success,
        ],200);
       }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
