<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(Request $request)
    {
        $request->headers->set('Accept', 'application/json');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        
        
        if ($validated) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
           

            $token = $user->createToken('Token name');
            return response()->json(['user' => $user, 'token' => $token, 'message' => 'User Registered Successfully'], 200);
        } else {
            return response()->json($validated);
            
        
        }
    }

    public function login(Request $request)
    {


        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validated) {
            $credentials = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);
            if ($credentials) {
                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('Token name');
                return response()->json([
                    'user' => $user,
                    'token' => $token,
                    'message' => 'User Logged in Successfully',

                ], 200);
            } else {
                return response()->json([
                    'message' => 'Invalid Credentials',
                ], 400);
            }
        } else {
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 400);
            
        }
    }
}
