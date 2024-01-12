<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $students_list = User::select( 'id','first_name', 'last_name', 'school', 'student_index', 'email')->where('role', 'user')->get();
        return response()->json(['students_list' => $students_list]);
    }

    public function deleteStudent(Request $request)
    {
        $id = $request->id;
        $student = User::findOrFail($id);
        $student->delete();
        return response()->json(200);
    }
    // guests----
    public function listGuests()
    {
        $guests_list = User::select( 'id','first_name', 'last_name', 'school', 'student_index', 'email')->where('role', 'guest')->get();
        return response()->json(['guests_list' => $guests_list]);
    }

    public function deleteGuest(Request $request)
    {
        $id = $request->id;
        $guest = User::findOrFail($id);
        $guest->delete();
        return response()->json(200);
    }
    // school admins----
    public function listSchoolAdmins()
    {
        $school_admins_list = User::select( 'id','first_name', 'last_name', 'school', 'student_index', 'email')->where('role', 'school')->get();
        return response()->json(['school_admins_list' => $school_admins_list]);
    }

    public function deleteSchoolAdmin(Request $request)
    {
        $id = $request->id;
        $school_admin = User::findOrFail($id);
        $school_admin->delete();
        return response()->json(200);
    }

    // teacher ----
    public function listTeachers()
    {
        $teachers_list = User::select( 'id','first_name', 'last_name', 'school', 'student_index', 'email')->where('role', 'teacher')->get();
        return response()->json(['teachers_list' => $teachers_list]);
    }

    public function deleteTeacher(Request $request)
    {
        $id = $request->id;
        $teacher = User::findOrFail($id);
        $teacher->delete();
        return response()->json(200);
    }
}
