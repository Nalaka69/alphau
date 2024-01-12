<?php

namespace App\Http\Controllers\admin\day_archive;

use App\Http\Controllers\Controller;
use App\Models\DayArchive;
use App\Models\DayArchiveAudioFile;
use App\Models\Program;
use App\Models\ProgramArchive;
use Illuminate\Http\Request;

class DayArchiveController extends Controller
{
    public function storeDayArchive(Request $request)
    {
        $data = $request->all();
        $program = Program::where('program_name', $data['program_name'])
        ->where('episode', $data['episode'])
        ->first(['id', 'program_file', 'duration']);
        $day_program = DayArchive::create([
            'archive_date' => $data['archive_date'],
            'archive_time' => $data['archive_time'],
            'episode' => $data['episode'],
            'is_visible' => 'show',
            'program_file' => $program->program_file,
            'duration' => $program->duration,
            'program_id' => $program->id
        ]);
    }

    public function deleteDayArchive(Request $request)
    {
        $id = $request->id;
        $automation = DayArchive::findOrFail($id);
        $automation->delete();
        return response()->json(200);
    }

    public function listDayArchives()
    {
        $day_archives_list = DayArchive::select('id', 'program_file', 'duration', 'archive_date', 'archive_time')
            ->get();
        return response()->json(['day_archives_list' => $day_archives_list]);
    }
}
