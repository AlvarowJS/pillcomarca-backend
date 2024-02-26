<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
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
        $rol = $user->role->role_number;
        $user->role = $rol;
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
        $dependencia = $request->dependencia_id;
        // Alcalde
        if ($dependencia == 34) {
            $roleId = 2;
        }
        // Gerencia Municipal
        elseif ($dependencia == 35) {
            $roleId = 3;
        }
        // Imagen
        elseif ($dependencia == 5) {
            $roleId = 4;
        }
        // Recursos Humanos
        elseif ($dependencia == 9) {
            $roleId = 5;
        }
        // Archivos
        elseif ($dependencia == 8) {
            $roleId = 6;
        }
        // Guardia
        elseif ($dependencia == 21) {
            $roleId = 7;
        } else {
            $roleId = 8;
        }
        $roleNumber = Role::where('role_number', $roleId)->get();
        
        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,
            'dni' => $request->dni,
            'email' => $request->email,
            'role_id' => $roleNumber[0]->id,
            'password' => Hash::make($request->password),
            'cargo_id' => $request->cargo_id,
            'dependencia_id' => $request->dependencia_id,
            'estado' => true
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
            $rol = $user->role->role_number;
            $id = $user->id;
            $nombres = $user->nombres;
            $apellidos = $user->apellidos;
            $cargo = $user->cargo_id;
            $dependencia = $user->dependencia_id;
            $token = $user->createToken('api_token')->plainTextToken;
            return response()->json([
                'api_token' => $token,
                'rol' => $rol,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'cargo' => $cargo,
                'dependencia' => $dependencia,
                'user' => $id
            ], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}