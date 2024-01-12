<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PlayToggle;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class RightController extends Controller
{
    public function viewRightHome()
    {
        return view('app.admin.dashboard_right.dashboard_right');
    }
    public function viewUsers()
    {
        $schools_list = School::select('school_name')->get();
        return view('app.admin.dashboard_right.users', compact('schools_list'));
    }
    public function viewSchools()
    {
        return view('app.admin.dashboard_right.schools');
    }
    public function viewNotifications()
    {
        return view('app.admin.dashboard_right.notifications');
    }
}
