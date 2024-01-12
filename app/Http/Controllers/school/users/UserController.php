<?php

namespace App\Http\Controllers\school\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function storeUser(Request $request)
    {
        $data = $request->all();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'role' => $data['category'],
            'school' => $data['school'],
            'student_index' => $data['student_index'],
            'password' => Hash::make('12345678'),
            'is_active' => 'active'
        ]);
    }
    // students----
    public function listStudents()
    {
        $students_list = User::select( 'id','first_name', 'last_name', 'school', 'student_index', 'email')
        ->where('role', 'user')
        ->where('school', Auth::user()->school)
        ->get();
        return response()->json(['students_list' => $students_list]);
    }
}
