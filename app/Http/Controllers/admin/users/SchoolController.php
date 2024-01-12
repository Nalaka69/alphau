<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function storeSchool(Request $request)
    {
        $data = $request->all();
        $school = School::create([
            'province' => $data['province'],
            'district' => $data['district'],
            'school_name' => $data['school_name'],
            'school_adddress' => $data['school_adddress'],
            'school_index' => $data['school_index'],
            'is_visible' => 'show'
        ]);
    }

    public function listSchools()
    {
        $schools_list = School::select('id', 'school_name', 'province', 'district', 'school_adddress', 'school_index')->get();
        return response()->json(['schools_list' => $schools_list]);
    }

    public function deleteSchool(Request $request)
    {
        $id = $request->id;
        $school = School::findOrFail($id);
        $school->delete();
        return response()->json(200);
    }
}
