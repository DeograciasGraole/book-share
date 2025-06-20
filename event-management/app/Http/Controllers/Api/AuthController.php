<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //
    public function login(Request $request){
          $request->validate([
            'email'=>'required|email',
            'password'=>'required'
          ]);
//check if email exist in the database
          $user=User::where('email',$request->email)->first();

          if(!$user){
            throw ValidationException::withMessages([
                'email'=>['the provided credentials are incorrect']
            ]);
          }
//check if the password are not  matching it will return false
if(!Hash::check($request->password, $user->password)){
    throw ValidationException::withMessages([
                'email'=>['the provided credentials are incorrect']
            ]);
};

$token=$user->createToken('api-token')->plainTextToken;
   return response()->json([
    'token'=>$token
   ]);
    }
    public function logout(Request $request  ){

    }
}
