<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'role' => 'user',
            'school' => $data['school'],
            'student_index' => $data['student_index'],
            'password' => Hash::make($data['password']),
            'is_active' => 'active'
        ]);
    }

    public function login(Request $request)
    {

        $data = $request->json()->all();
        $email = $data['email'];
        $password = $data['password'];
        $hashed_password = Hash::check($password, $password);
        $user = User::where('email', $email)->where('password', $hashed_password)->first();
        return response()->json(['user' => $user]);
    }
}
