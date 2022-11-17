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
    //
    // public function login(Request $request){
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);
 
    //     if (Auth::attempt($credentials)) {
    //         $json = User::where('email', $credentials['email'])->first();
    //         return response()->json([$json,'token' => $request->user()->createToken($request->email)->plainTextToken], 200);
    //     }
 
    //     return response()->json(['status' => 'failed load data!'], 400);
    // }

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

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email|unique:users',
    //         'password' => ['required', 'string', 'min:8', 'confirmed', Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return response()->json(
    //         [
    //             'token' => $user->createToken($request->device_name)->plainTextToken,
    //         ],
    //         200
    //     );
    // }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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
