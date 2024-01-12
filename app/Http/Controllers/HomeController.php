<?php

namespace App\Http\Controllers;
use App\Models\DayArchive;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function userHome()
    {
      
    return view('app.welcome.index');
    }

    public function schoolHome()
    {
        return view('app.moderator.school');
    }

    public function adminHome()
    {
        return view('app.admin.admin');
    }
}
