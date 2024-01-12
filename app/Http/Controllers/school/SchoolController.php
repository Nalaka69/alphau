<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function schoolProfile()
    {
        return view('app.moderator.profile');
    }
    public function newStudent()
    {
        return view('app.moderator.new_student');
    }
}
