<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            $response = [
                'status' => false,
                'message' => $validator->errors(),
            ];

            return response()->json($response);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $result['accessToken'] =  $user->createToken('RestApi')->plainTextToken;
        $result['name'] =  $user->name;

        $response = [
            'status' => true,
            'data'    => $result,
            'message' => 'User register successfully.',
        ];

        return response()->json($response);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            $response = [
                'status' => false,
                'message' => $validator->errors(),
            ];

            return response()->json($response);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $result['accessToken'] =  $user->createToken('RestApi')->plainTextToken;
            $result['name'] =  $user->name;

            $response = [
                'status' => true,
                'data'    => $result,
                'message' => 'User login successfully.',
            ];

            return response()->json($response);
        }
        else{
            $response = [
                'status' => false,
                'message' => 'Unauthorised',
            ];

            return response()->json($response);
        }
    }

    public function user()
    {
        $response = [
            'status' => true,
            'data'    => Auth::user(),
            'message' => 'User retrieved.',
        ];

        return response()->json($response);
    }

    public function logout() {
        Auth::user()->tokens()->delete();

        $response = [
            'status' => true,
            'message' => 'User Logout.',
        ];

        return response()->json($response);
    }
}
