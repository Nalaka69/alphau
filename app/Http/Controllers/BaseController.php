<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramArchive;
use App\Models\User;
use App\Models\DayArchive;
use App\Models\timeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BaseController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        $timeTable = timeTable::where('date', $today)->get();
        $archiveslist = ProgramArchive::select('id', 'program_name', 'program_genre', 'program_thumbanail')->get();
        return view('app.welcome.index', compact('archiveslist','timeTable'));
    }
    // blogs
    public function blog()
    {
        // $archiveslist = ProgramArchive::select('id', 'program_name', 'program_genre', 'program_thumbanail')->get();
        // return view('app.welcome.index', compact('archiveslist'));
        return view('app.welcome.blog');
    }
    public function blogSingle()
    {
        // $archiveslist = ProgramArchive::select('id', 'program_name', 'program_genre', 'program_thumbanail')->get();
        // return view('app.welcome.index', compact('archiveslist'));
        return view('app.welcome.blog_single');
    }
    // programs
    public function programs()
    {
        $programs_list = Program::select('id', 'program_name', 'episode', 'program_file', 'episode_date', 'episode_time')
            ->get();
        $program_archives_list = Program::select('id', 'program_name')
            ->get();
        // return response()->json(['programs_list' => $programs_list]);
        return view('app.welcome.programs', compact('programs_list', 'program_archives_list'));
    }
    public function welcomeProgramsList(Request $request)
    {
        $selectedDate = $request->input('selectedDate');
        $programs = Program::whereDate('episode_date', $selectedDate)
            ->select('id', 'program_name', 'episode', 'program_file', 'duration', 'program_thumbanail', 'program_genre')
            ->get();

        return response()->json(['programs' => $programs]);
    }

    // filtering to program name
    public function programArchivesList()
    {
        $programArchivesList = ProgramArchive::select('id', 'program_name')->get()->toArray();
        return response()->json(['programArchivesList' => $programArchivesList]);
    }

    public function welcomeArchiveProgramsList(Request $request)
    {
        $selectedProgram = $request->input('selectedArchive');
        $archive_programs = Program::where('program_name', $selectedProgram)
            ->select('id', 'program_name', 'episode', 'program_file', 'duration', 'program_thumbanail', 'program_genre', 'episode_date')
            ->get();

        return response()->json(['archive_programs' => $archive_programs]);
    }

    // about
    public function about()
    {
        return view('app.welcome.about');
    }

    // student user management
    public function userProfile()
    {
        return view('app.student.profile');
    }
// update user-student
public function userUpdate(Request $request)
{
    $data = $request->all();
    $userId = Auth::id();
    $currentUser = Auth::user();

    if (!Hash::check($data['current_password'], $currentUser->password)) {
        return response()->json(['error' => 'Current password is incorrect.'], 422);
    }
    // Update the user information
    $user = User::find($userId);
    $user->first_name = $data['first_name'];
    $user->last_name = $data['last_name'];
    $user->email = $data['email'];
    $user->school = $data['school'];
    if (!empty($data['new_password'])) {
        $user->password = Hash::make($data['new_password']);
    }

    $user->save();

    return response()->json(['success' => 'Profile updated successfully'], 200);
}

public function header()
{
    return view('app.welcome.layout.header');
}
}
