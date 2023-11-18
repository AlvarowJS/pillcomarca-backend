<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function authToken(Request $request)
    {
        $token = $request->header('Authorization');
        $user = Auth::user();
        $tableName = $user->getTable();
        $user->token = $token;
        $user->table = $tableName;
        return $user;
    }
    public function registerAdmin(Request $request)
    {
        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,                        
            'dni' => $request->dni,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
            'cargo_id' => $request->cargo_id,
            'dependencia_id' => $request->dependencia_id,
            'estado' => true
        ]);
        return response()->json([
            'message' => 'Administrador creado exitosamente.',
            'user' => $user,
        ], 201);
    }
    public function registerUser(Request $request)
    {
        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,                        
            'dni' => $request->dni,
            'email' => $request->email,
            'role_id' => 6,
            'password' => Hash::make($request->password),
            'cargo_id' => $request->cargo_id,
            'dependencia_id' => $request->dependencia_id,
        ]);
        return response()->json([
            'message' => 'Usuario creado exitosamente.',
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $rol = $user->role_id;
            $nombres = $user->nombres;
            $apellidos = $user->apellidos;
            $cargo = $user->cargo_id;
            $token = $user->createToken('api_token')->plainTextToken;
            return response()->json([
                'api_token' => $token, 
                'rol' => $rol,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'cargo' => $cargo,
            ], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}